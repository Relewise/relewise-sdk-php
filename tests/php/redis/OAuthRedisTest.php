<?php declare(strict_types=1);

namespace Relewise\Tests\Redis;

require_once __DIR__ . '/../fixtures/RedisOAuthCache.php';

use PHPUnit\Framework\TestCase;
use Relewise\{OAuthToken, OAuthTokenCacheEntry};
use Relewise\Infrastructure\HttpClient\{Deadline, RequestTimeoutException};

/** Opt-in: use a disposable Redis instance, because one test pauses that instance briefly. */
final class OAuthRedisTest extends TestCase
{
    private RedisConnection $redis;
    private string $prefix;

    protected function setUp(): void
    {
        if (getenv('RUN_OAUTH_REDIS') !== '1') { self::markTestSkipped('Set RUN_OAUTH_REDIS=1 for disposable Redis tests.'); }
        $port = filter_var(getenv('OAUTH_REDIS_PORT'), FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 65535]]);
        self::assertNotFalse($port, 'Set OAUTH_REDIS_PORT to the disposable loopback Redis port.');
        $this->redis = new RedisConnection($port);
        $this->prefix = 'php-sdk-test:' . bin2hex(random_bytes(12));
        self::assertSame('PONG', $this->redis->command(new Deadline(2), 'PING'));
    }

    protected function tearDown(): void
    {
        if (!isset($this->prefix)) { return; }
        // Restricted to this test's random namespace; never FLUSHDB/FLUSHALL.
        $this->redis->command(new Deadline(3), 'EVAL',
            "local keys=redis.call('KEYS',ARGV[1]); for _,key in ipairs(keys) do redis.call('DEL',key) end return #keys",
            '0', $this->prefix . ':*');
    }

    public function testColdProcessesAndLaterProcessReuseOneTokenAndOriginalExpiry(): void
    {
        $first = $this->workers(8);
        $this->assertShared($first);
        self::assertSame($first[0], $this->workers(1)[0]);
        self::assertSame(1, $this->acquisitions());
    }

    public function testConcurrentRenewalAfterExpiryAcquiresOnce(): void
    {
        $first = $this->workers(1, ['lifetime' => 1])[0];
        usleep(1100000);
        $renewed = $this->workers(8);
        $this->assertShared($renewed);
        self::assertNotSame($first['hash'], $renewed[0]['hash']);
        self::assertGreaterThan((float) $first['expiry'], (float) $renewed[0]['expiry']);
        self::assertSame(2, $this->acquisitions());
    }

    public function testRejectedTokenIsReplacedOnceAndLateRejectionReusesReplacement(): void
    {
        $this->workers(1);
        $replacement = $this->workers(8, ['rejected' => 'fixture-token-1']);
        $this->assertShared($replacement);
        self::assertSame($replacement[0], $this->workers(1, ['rejected' => 'fixture-token-1'])[0]);
        self::assertSame(2, $this->acquisitions());
    }

    public function testRenewalBoundarySurvivesRedisSerializationBeforeTokenExpiry(): void
    {
        $first = $this->workers(1, ['lifetime' => 30])[0];
        // Move only the provider's clock into its renewal window; Redis still retains the entry.
        $renewed = $this->workers(8, ['clockOffset' => 28]);
        $this->assertShared($renewed);
        self::assertGreaterThan(microtime(true), (float) $first['expiry']);
        self::assertNotSame($first['hash'], $renewed[0]['hash']);
        self::assertSame(2, $this->acquisitions());
    }

    public function testFailedReplacementClearsOldEntryAndReleasesLock(): void
    {
        $this->workers(1);
        $failed = $this->workers(1, ['fail' => true, 'rejected' => 'fixture-token-1'])[0];
        self::assertFalse($failed['ok']);
        self::assertSame(503, $failed['code']);
        $start = hrtime(true);
        $replacement = $this->workers(1)[0];
        self::assertTrue($replacement['ok']);
        self::assertSame(hash('sha256', 'fixture-token-3'), $replacement['hash']);
        self::assertLessThan(3.0, (hrtime(true) - $start) / 1e9, 'Failure must release the 15-second lease promptly.');
        self::assertSame(3, $this->acquisitions());
    }

    public function testSecretAndDatasetConfigurationsHaveSeparateEntries(): void
    {
        $original = $this->workers(1)[0];
        $secret = $this->workers(1, ['secret' => 'rotated-fixture-secret'])[0];
        $dataset = $this->workers(1, ['dataset' => 'different-dataset'])[0];
        self::assertNotSame($original['hash'], $secret['hash']);
        self::assertNotSame($original['hash'], $dataset['hash']);
        self::assertSame($original, $this->workers(1)[0]);
        self::assertSame(3, $this->acquisitions());
    }

    public function testWaitingTimeoutLeavesHolderLockAndOtherKeysUnblocked(): void
    {
        $cache = new RedisOAuthCache($this->redis, $this->prefix);
        $this->redis->command(new Deadline(2), 'SET', $cache->key('busy') . ':lock', 'holder', 'PX', '5000');
        $token = new OAuthToken('fixture-token', new \DateTimeImmutable('+5 minutes'));
        self::assertSame($token, $cache->synchronized('other', new Deadline(1), fn () => $token));
        $start = hrtime(true);
        try
        {
            $cache->synchronized('busy', new Deadline(1), function () { self::fail('Waiter must not enter the callback.'); });
            self::fail('Expected lock wait timeout.');
        }
        catch (RequestTimeoutException)
        {
            $elapsed = (hrtime(true) - $start) / 1e9;
            self::assertGreaterThan(0.85, $elapsed);
            self::assertLessThan(1.5, $elapsed);
        }
        self::assertSame('holder', $this->redis->command(new Deadline(2), 'GET', $cache->key('busy') . ':lock'));
    }

    public function testExpiredOwnerCannotWriteOrReleaseSuccessorLock(): void
    {
        $cache = new RedisOAuthCache($this->redis, $this->prefix);
        $deadline = new Deadline(3);
        $lock = $cache->key('lease') . ':lock';
        try
        {
            $cache->synchronized('lease', $deadline, function () use ($cache, $deadline, $lock) {
                $this->redis->command($deadline, 'PEXPIRE', $lock, '1');
                usleep(20000);
                self::assertSame('OK', $this->redis->command($deadline, 'SET', $lock, 'successor', 'NX', 'PX', '5000'));
                $cache->set('lease', new OAuthTokenCacheEntry(
                    new OAuthToken('stale-token', new \DateTimeImmutable('+5 minutes')), microtime(true) + 290
                ), $deadline);
                self::fail('Expired owner must not write.');
            });
        }
        catch (\RuntimeException $exception)
        {
            self::assertSame('Test Redis lock ownership was lost.', $exception->getMessage());
        }
        self::assertNull($this->redis->command($deadline, 'GET', $cache->key('lease')));
        self::assertSame('successor', $this->redis->command($deadline, 'GET', $lock));
    }

    public function testExpiredCallbackLeaseRecoversWithoutExtendingDeadline(): void
    {
        $cache = new RedisOAuthCache($this->redis, $this->prefix);
        $deadline = new Deadline(1);
        try
        {
            $cache->synchronized('expired', $deadline, function () use ($deadline) {
                usleep(1050000);
                $deadline->throwIfExpired();
            });
            self::fail('Expected callback timeout.');
        }
        catch (RequestTimeoutException) {}
        $token = new OAuthToken('fixture-token', new \DateTimeImmutable('+5 minutes'));
        self::assertSame($token, $cache->synchronized('expired', new Deadline(1), fn () => $token));
        self::assertNull($this->redis->command(new Deadline(1), 'GET', $cache->key('expired') . ':lock'));
    }

    public function testRedisStallIsBoundedByTheSameDeadline(): void
    {
        // This is why the suite explicitly requires a disposable instance.
        $this->redis->command(new Deadline(2), 'CLIENT', 'PAUSE', '1500');
        $start = hrtime(true);
        try
        {
            $this->redis->command(new Deadline(1), 'GET', $this->prefix . ':missing');
            self::fail('Expected Redis read timeout.');
        }
        catch (RequestTimeoutException)
        {
            self::assertLessThan(1.5, (hrtime(true) - $start) / 1e9);
        }
    }

    public function testLiveProcessesShareOneAcquisitionAndSearchSuccessfully(): void
    {
        if (getenv('RUN_OAUTH_INTEGRATION') !== '1') { self::markTestSkipped('Enable RUN_OAUTH_INTEGRATION for live Redis/OAuth coverage.'); }
        foreach (['DATASET_ID', 'SERVER_URL', 'OAUTH_CLIENT_ID', 'OAUTH_CLIENT_SECRET'] as $name)
        {
            self::assertNotEmpty(getenv($name), 'Missing ' . $name);
        }
        $first = $this->workers(8, ['live' => true]);
        $this->assertShared($first);
        self::assertSame($first[0], $this->workers(1, ['live' => true])[0]);
        self::assertSame(1, $this->acquisitions());
    }

    private function acquisitions(): int
    {
        return (int) $this->redis->command(new Deadline(2), 'GET', $this->prefix . ':acquisitions');
    }

    private function assertShared(array $results): void
    {
        foreach ($results as $result)
        {
            self::assertTrue($result['ok'], 'Worker must succeed.');
            self::assertSame($results[0], $result, 'Processes must share token and original expiry.');
        }
    }

    private function workers(int $count, array $options = []): array
    {
        $workers = [];
        try
        {
            for ($index = 0; $index < $count; $index++)
            {
                $process = proc_open([PHP_BINARY, '-c', php_ini_loaded_file() ?: '',
                    __DIR__ . '/../fixtures/oauth-redis-worker.php',
                    json_encode(['prefix' => $this->prefix] + $options, JSON_THROW_ON_ERROR)],
                    [0 => ['pipe', 'r'], 1 => ['pipe', 'w'], 2 => ['pipe', 'w']], $pipes);
                self::assertIsResource($process);
                stream_set_timeout($pipes[1], 25);
                $workers[] = [$process, $pipes];
            }
            foreach ($workers as [$process, $pipes]) { fwrite($pipes[0], "start\n"); fflush($pipes[0]); }
            $results = [];
            foreach ($workers as [$process, $pipes])
            {
                $line = fgets($pipes[1]);
                self::assertNotFalse($line, 'Redis worker must return a sanitized result.');
                $results[] = json_decode($line, true, flags: JSON_THROW_ON_ERROR);
            }
            return $results;
        }
        finally
        {
            foreach ($workers as [$process, $pipes])
            {
                foreach ($pipes as $pipe) { fclose($pipe); }
                if (proc_get_status($process)['running']) { proc_terminate($process); }
                proc_close($process);
            }
        }
    }
}
