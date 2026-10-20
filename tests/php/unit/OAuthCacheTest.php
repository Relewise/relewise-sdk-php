<?php declare(strict_types=1);

namespace Relewise\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Relewise\{OAuthToken, OAuthTokenCache, OAuthTokenCacheEntry, OAuthTokenProvider};
use Relewise\Infrastructure\HttpClient\{ClientException, Deadline, DeadlineAwareClient, RequestTimeoutException, Response};

class OAuthCacheTest extends TestCase
{
    private const ID = '11111111-2222-3333-4444-555555555555';
    private const ENDPOINT = 'https://example.test/' . self::ID . '/oauth/token';

    public function testSeparateProvidersReuseOriginalExpiryAndCoordinateRejections(): void
    {
        $cache = new TestTokenCache();
        $transport = new CacheTestTransport();
        $first = new CacheTestProvider(self::ID, 'secret', $cache);
        $second = new CacheTestProvider(self::ID, 'secret', $cache);
        $a = $first->getToken(self::ENDPOINT, $transport);
        self::assertSame(1300.0, (float) $a->expiresAt->format('U.u'));
        self::assertSame($a, $second->getToken(self::ENDPOINT, $transport));
        $b = $second->getToken(self::ENDPOINT, $transport, rejectedToken: $a->accessToken);
        self::assertSame($b, $first->getToken(self::ENDPOINT, $transport, rejectedToken: $a->accessToken));
        self::assertSame(2, $transport->calls);
        self::assertFalse($cache->locked);
    }

    public function testRenewalAt290SecondsPreservesExpiryAcrossProviders(): void
    {
        $cache = new TestTokenCache();
        $transport = new CacheTestTransport();
        $first = new CacheTestProvider(self::ID, 'secret', $cache);
        $token = $first->getToken(self::ENDPOINT, $transport);
        $second = new CacheTestProvider(self::ID, 'secret', $cache);
        $second->time = 1289.999;
        self::assertSame($token, $second->getToken(self::ENDPOINT, $transport));
        $second->time = 1290;
        self::assertNotSame($token, $second->getToken(self::ENDPOINT, $transport));
        self::assertSame(2, $transport->calls);
        self::assertSame(1300.0, (float) $token->expiresAt->format('U.u'));
    }

    public function testCacheKeysIsolateEndpointDatasetClientAndSecretRotation(): void
    {
        $cache = new TestTokenCache();
        $transport = new CacheTestTransport();
        foreach ([
            [self::ID, 'original-secret', self::ENDPOINT],
            [self::ID, 'rotated-secret', self::ENDPOINT],
            [self::ID, 'original-secret', 'https://other.test/' . self::ID . '/oauth/token'],
            [self::ID, 'original-secret', 'https://example.test/aaaaaaaa-bbbb-cccc-dddd-eeeeeeeeeeee/oauth/token'],
            ['aaaaaaaa-bbbb-cccc-dddd-eeeeeeeeeeee', 'original-secret', self::ENDPOINT],
        ] as [$id, $secret, $endpoint])
        {
            (new CacheTestProvider($id, $secret, $cache))->getToken($endpoint, $transport);
        }
        self::assertCount(5, $cache->entries);
        self::assertSame(5, $transport->calls);
        foreach (array_keys($cache->entries) as $key)
        {
            self::assertMatchesRegularExpression('/^relewise:oauth:[a-f0-9]{64}$/', $key);
        }
    }

    public function testAcquisitionFailureClearsSharedTokenAndReleasesLock(): void
    {
        $cache = new TestTokenCache();
        $transport = new CacheTestTransport();
        $provider = new CacheTestProvider(self::ID, 'secret', $cache);
        $token = $provider->getToken(self::ENDPOINT, $transport);
        $transport->fail = true;
        try
        {
            $provider->getToken(self::ENDPOINT, $transport, rejectedToken: $token->accessToken);
            self::fail('Expected acquisition failure.');
        }
        catch (ClientException $exception)
        {
            self::assertFalse($cache->locked);
            self::assertSame([], $cache->entries);
        }
        $transport->fail = false;
        self::assertNotSame($token, $provider->getToken(self::ENDPOINT, $transport));
        self::assertSame(3, $transport->calls);
    }

    public function testLateLockAcquisitionCannotStartTokenTraffic(): void
    {
        $cache = new TestTokenCache();
        $cache->lockDelay = 1050000;
        $transport = new CacheTestTransport();
        try
        {
            (new CacheTestProvider(self::ID, 'secret', $cache))->getToken(self::ENDPOINT, $transport, 1);
            self::fail('Late acquisition must fail.');
        }
        catch (RequestTimeoutException $exception)
        {
            self::assertSame(0, $transport->calls);
            self::assertFalse($cache->locked);
        }
    }

    public function testAllCacheOperationsReceiveTheAcquisitionDeadline(): void
    {
        $cache = new TestTokenCache();
        $transport = new CacheTestTransport();
        $deadline = new Deadline(5);
        (new CacheTestProvider(self::ID, 'secret', $cache))->getTokenWithDeadline(self::ENDPOINT, $transport, $deadline);
        self::assertCount(4, $cache->deadlines);
        foreach ($cache->deadlines as $actual)
        {
            self::assertSame($deadline, $actual);
        }
        self::assertSame($deadline, $transport->deadline);
    }
}

class CacheTestProvider extends OAuthTokenProvider
{
    public float $time = 1000;
    protected function now(): float { return $this->time; }
}

class TestTokenCache implements OAuthTokenCache
{
    public array $entries = [];
    public array $deadlines = [];
    public bool $locked = false;
    public int $lockDelay = 0;

    public function synchronized(string $key, Deadline $deadline, callable $callback): OAuthToken
    {
        $this->deadlines[] = $deadline;
        usleep($this->lockDelay);
        $this->locked = true;
        try
        {
            return $callback();
        }
        finally
        {
            $this->locked = false;
        }
    }

    public function get(string $key, Deadline $deadline): ?OAuthTokenCacheEntry
    {
        TestCase::assertTrue($this->locked);
        $this->deadlines[] = $deadline;
        return $this->entries[$key] ?? null;
    }

    public function set(string $key, ?OAuthTokenCacheEntry $entry, Deadline $deadline): void
    {
        TestCase::assertTrue($this->locked);
        $this->deadlines[] = $deadline;
        if ($entry === null) { unset($this->entries[$key]); }
        else { $this->entries[$key] = $entry; }
    }
}

class CacheTestTransport implements DeadlineAwareClient
{
    public int $calls = 0;
    public bool $fail = false;
    public ?Deadline $deadline = null;

    public function postWithDeadline($url, $data, array $header, Deadline $deadline, int $httpVersion = CURL_HTTP_VERSION_NONE): Response
    {
        $this->deadline = $deadline;
        $this->calls++;
        return $this->fail
            ? new Response(['sensitive' => 'secret'], 503, null)
            : new Response(['access_token' => 'token-' . $this->calls, 'expires_in' => 300, 'token_type' => 'Bearer'], 200, null);
    }

    public function post($url, $data = null, array $header = [], int $timeout = 3, int $httpVersion = CURL_HTTP_VERSION_NONE): Response
    {
        throw new \LogicException('OAuth must use the deadline-aware entry point.');
    }
}
