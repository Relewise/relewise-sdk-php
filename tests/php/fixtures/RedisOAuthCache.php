<?php declare(strict_types=1);

namespace Relewise\Tests\Redis;

use Relewise\{OAuthToken, OAuthTokenCache, OAuthTokenCacheEntry};
use Relewise\Infrastructure\HttpClient\{Deadline, RequestTimeoutException};

/**
 * Test-only RESP connection to a disposable loopback Redis server.
 * Nonblocking I/O reapplies the remaining deadline before every wait.
 * Intentionally limited to the scalar replies used by this fixture.
 */
final class RedisConnection
{
    public function __construct(private int $port) {}

    public function command(Deadline $deadline, string ...$arguments): mixed
    {
        $deadline->throwIfExpired();
        $socket = @stream_socket_client('tcp://127.0.0.1:' . $this->port, $errno, $error, 0,
            STREAM_CLIENT_CONNECT | STREAM_CLIENT_ASYNC_CONNECT);
        if ($socket === false) { throw new \RuntimeException('Test Redis connection failed.'); }
        stream_set_blocking($socket, false);
        try
        {
            $request = '*' . count($arguments) . "\r\n";
            foreach ($arguments as $argument) { $request .= '$' . strlen($argument) . "\r\n" . $argument . "\r\n"; }
            while ($request !== '')
            {
                $this->wait($socket, $deadline, true);
                $written = @fwrite($socket, $request);
                if ($written === false || $written === 0) { throw new \RuntimeException('Test Redis write failed.'); }
                $request = substr($request, $written);
            }
            $buffer = '';
            $length = null;
            while (true)
            {
                $this->wait($socket, $deadline, false);
                $chunk = fread($socket, 8192);
                if ($chunk === false || ($chunk === '' && feof($socket))) { throw new \RuntimeException('Test Redis read failed.'); }
                $buffer .= $chunk;
                $end = strpos($buffer, "\r\n");
                if ($end === false) { continue; }
                $value = substr($buffer, 1, $end - 1);
                switch ($buffer[0])
                {
                    case '+': return $value;
                    case ':': return (int) $value;
                    case '-': throw new \RuntimeException('Test Redis command failed.'); // No command data in errors.
                    case '$':
                        $length = (int) $value;
                        if ($length === -1) { return null; }
                        if (strlen($buffer) >= $end + 2 + $length + 2) { return substr($buffer, $end + 2, $length); }
                        break;
                    default: throw new \RuntimeException('Unsupported test Redis reply.');
                }
            }
        }
        finally { fclose($socket); }
    }

    private function wait($socket, Deadline $deadline, bool $writing): void
    {
        $milliseconds = $deadline->remainingMilliseconds();
        $read = $writing ? [] : [$socket];
        $write = $writing ? [$socket] : [];
        $except = [$socket];
        $ready = stream_select($read, $write, $except, intdiv($milliseconds, 1000), ($milliseconds % 1000) * 1000);
        if ($ready === false || $except !== []) { throw new \RuntimeException('Test Redis socket failed.'); }
        if ($ready === 0) { throw new RequestTimeoutException('Test Redis operation timed out.'); }
        $deadline->throwIfExpired();
    }
}

/**
 * Single-instance Redis integration fixture, not a supported production adapter.
 * Each lease covers the caller's remaining budget plus 250ms for expiry fallback.
 * Owner-checked writes prevent an expired owner overwriting its successor.
 * If the deadline is exhausted, cleanup relies on lease expiry rather than extending it.
 * Production adapters must additionally address their deployment's failover/lease policy.
 */
final class RedisOAuthCache implements OAuthTokenCache
{
    private array $owners = [];

    public function __construct(public readonly RedisConnection $redis, private string $prefix) {}

    public function key(string $key): string { return $this->prefix . ':' . $key; }

    public function synchronized(string $key, Deadline $deadline, callable $callback): OAuthToken
    {
        $lock = $this->key($key) . ':lock';
        $owner = bin2hex(random_bytes(16));
        while ($this->redis->command($deadline, 'SET', $lock, $owner, 'NX', 'PX',
            (string) ($deadline->remainingMilliseconds() + 250)) !== 'OK')
        {
            usleep(min(10000, $deadline->remainingMilliseconds() * 1000));
        }
        $this->owners[$key] = $owner;
        try
        {
            $deadline->throwIfExpired();
            return $callback();
        }
        finally
        {
            unset($this->owners[$key]);
            try
            {
                $this->redis->command($deadline, 'EVAL',
                    "if redis.call('GET',KEYS[1]) == ARGV[1] then return redis.call('DEL',KEYS[1]) end return 0",
                    '1', $lock, $owner);
            }
            catch (\Throwable) { /* The bounded lease expires even after process/connection failure. */ }
        }
    }

    public function get(string $key, Deadline $deadline): ?OAuthTokenCacheEntry
    {
        $json = $this->redis->command($deadline, 'GET', $this->key($key));
        if ($json === null) { return null; }
        $value = json_decode($json, true, flags: JSON_THROW_ON_ERROR);
        return new OAuthTokenCacheEntry(
            new OAuthToken($value['token'], new \DateTimeImmutable($value['expiresAt'])), $value['renewAt']
        );
    }

    public function set(string $key, ?OAuthTokenCacheEntry $entry, Deadline $deadline): void
    {
        $json = $entry === null ? '' : json_encode([
            'token' => $entry->token->accessToken,
            'expiresAt' => $entry->token->expiresAt->format('Y-m-d\TH:i:s.uP'),
            'renewAt' => $entry->renewAt,
        ], JSON_THROW_ON_ERROR);
        $ttl = $entry === null ? 1 : max(1, (int) ceil(((float) $entry->token->expiresAt->format('U.u') - microtime(true)) * 1000));
        $result = $this->redis->command($deadline, 'EVAL',
            "if redis.call('GET',KEYS[1]) ~= ARGV[1] then return 0 end "
            . "if ARGV[2] == '' then redis.call('DEL',KEYS[2]) else redis.call('PSETEX',KEYS[2],ARGV[3],ARGV[2]) end return 1",
            '2', $this->key($key) . ':lock', $this->key($key), $this->owners[$key] ?? '', $json, (string) $ttl);
        if ($result !== 1) { throw new \RuntimeException('Test Redis lock ownership was lost.'); }
    }
}
