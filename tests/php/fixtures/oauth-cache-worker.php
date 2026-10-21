<?php declare(strict_types=1);

require __DIR__ . '/../../../vendor/autoload.php';

use Relewise\{OAuthToken, OAuthTokenCache, OAuthTokenCacheEntry, OAuthTokenProvider};
use Relewise\Infrastructure\HttpClient\{Deadline, DeadlineAwareClient, Response};

// Test-only local-file adapter. Production applications supply their own storage and locks.
class FileTokenCache implements OAuthTokenCache
{
    public function __construct(private string $directory) {}

    public function synchronized(string $key, Deadline $deadline, callable $callback): OAuthToken
    {
        $lock = fopen($this->path($key) . '.lock', 'c');
        try
        {
            while (!flock($lock, LOCK_EX | LOCK_NB))
            {
                usleep(min(10000, $deadline->remainingMilliseconds() * 1000));
            }
            $deadline->throwIfExpired();
            return $callback();
        }
        finally
        {
            flock($lock, LOCK_UN);
            fclose($lock);
        }
    }

    public function get(string $key, Deadline $deadline): ?OAuthTokenCacheEntry
    {
        $deadline->throwIfExpired();
        $path = $this->path($key);
        if (!is_file($path)) { return null; }
        $entry = json_decode(file_get_contents($path), true, flags: JSON_THROW_ON_ERROR);
        return new OAuthTokenCacheEntry(
            new OAuthToken($entry['token'], new DateTimeImmutable($entry['expiresAt'])),
            $entry['renewAt']
        );
    }

    public function set(string $key, ?OAuthTokenCacheEntry $entry, Deadline $deadline): void
    {
        $deadline->throwIfExpired();
        $path = $this->path($key);
        if ($entry === null)
        {
            if (is_file($path)) { unlink($path); }
            return;
        }
        file_put_contents($path, json_encode([
            'token' => $entry->token->accessToken,
            'expiresAt' => $entry->token->expiresAt->format('Y-m-d\TH:i:s.uP'),
            'renewAt' => $entry->renewAt,
        ], JSON_THROW_ON_ERROR));
    }

    private function path(string $key): string
    {
        return $this->directory . '/' . hash('sha256', $key);
    }
}

$transport = new class($argv[1]) implements DeadlineAwareClient {
    public function __construct(private string $directory) {}

    public function postWithDeadline($url, $data, array $header, Deadline $deadline, int $httpVersion = CURL_HTTP_VERSION_NONE): Response
    {
        // Appending once per exchange reveals duplicate acquisitions across processes.
        file_put_contents($this->directory . '/acquisitions', "acquired\n", FILE_APPEND | LOCK_EX);
        usleep(100000);
        $deadline->throwIfExpired();
        return new Response(['access_token' => 'shared-token', 'expires_in' => 300, 'token_type' => 'Bearer'], 200, null);
    }

    public function post($url, $data = null, array $header = [], int $timeout = 3, int $httpVersion = CURL_HTTP_VERSION_NONE): Response
    {
        throw new LogicException('Expected the deadline-aware path.');
    }
};

// Parent releases all workers together, so cold callers contend for the same key.
fgets(STDIN);
$provider = new OAuthTokenProvider('11111111-2222-3333-4444-555555555555', 'secret', new FileTokenCache($argv[1]));
$token = $provider->getToken('https://example.test/dataset/oauth/token', $transport);
echo json_encode([$token->accessToken, $token->expiresAt->format('U.u')]), PHP_EOL;
