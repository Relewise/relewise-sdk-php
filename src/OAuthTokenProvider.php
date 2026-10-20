<?php declare(strict_types=1);

namespace Relewise;

use Relewise\Infrastructure\HttpClient\Client;
use Relewise\Infrastructure\HttpClient\ClientException;
use Relewise\Infrastructure\HttpClient\Deadline;
use Relewise\Infrastructure\HttpClient\DeadlineAwareClient;

/** Acquires client-credentials tokens. Reuse the provider to share its in-memory cache. */
class OAuthTokenProvider
{
    private string $authorization;
    private ?string $endpoint = null;
    private ?OAuthTokenCacheEntry $entry = null;

    public function __construct(string $clientId, string $clientSecret, private ?OAuthTokenCache $cache = null)
    {
        if (!preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}\z/i', $clientId)
            || $clientId === '00000000-0000-0000-0000-000000000000')
        {
            throw new \InvalidArgumentException('clientId must be a nonempty UUID.');
        }
        if (trim($clientSecret) === '')
        {
            throw new \InvalidArgumentException('clientSecret must not be empty.');
        }
        $this->authorization = 'Authorization: Basic ' . base64_encode(strtolower($clientId) . ':' . rawurlencode($clientSecret));
    }

    /**
     * Get a cached token, or renew it. Pass the rejected token only after an invalid_token challenge.
     * Standalone acquisition has one timeout budget, including cache and lock waiting.
     */
    public function getToken(
        string $endpoint,
        Client $client,
        int $timeout = 5,
        int $httpVersion = CURL_HTTP_VERSION_NONE,
        ?string $rejectedToken = null
    ): OAuthToken {
        return $this->getTokenWithDeadline($endpoint, $client, new Deadline($timeout), $httpVersion, $rejectedToken);
    }

    /** SDK requests pass their original deadline, including when replacing a rejected token. */
    public function getTokenWithDeadline(
        string $endpoint,
        Client $client,
        Deadline $deadline,
        int $httpVersion = CURL_HTTP_VERSION_NONE,
        ?string $rejectedToken = null
    ): OAuthToken {
        $deadline->throwIfExpired();
        if (!$client instanceof DeadlineAwareClient)
        {
            throw new \InvalidArgumentException('OAuth requires a transport implementing DeadlineAwareClient. Use DeadlineCurlClient or a deadline-aware custom transport.');
        }
        if (!filter_var($endpoint, FILTER_VALIDATE_URL)
            || strtolower((string) parse_url($endpoint, PHP_URL_SCHEME)) !== 'https'
            || parse_url($endpoint, PHP_URL_USER) !== null || parse_url($endpoint, PHP_URL_PASS) !== null
            || parse_url($endpoint, PHP_URL_QUERY) !== null || parse_url($endpoint, PHP_URL_FRAGMENT) !== null)
        {
            throw new \InvalidArgumentException('OAuth requires an HTTPS token endpoint without credentials, query, or fragment.');
        }
        // The endpoint includes the dataset. Hashing the credential configuration isolates secret rotations.
        $key = 'relewise:oauth:' . hash('sha256', $endpoint . "\0" . $this->authorization);
        if ($this->cache !== null)
        {
            $token = $this->cache->synchronized($key, $deadline, function () use ($key, $endpoint, $client, $deadline, $httpVersion, $rejectedToken): OAuthToken {
                return $this->acquire($key, $endpoint, $client, $deadline, $httpVersion, $rejectedToken);
            });
        }
        else
        {
            $token = $this->acquire($key, $endpoint, $client, $deadline, $httpVersion, $rejectedToken);
        }
        $deadline->throwIfExpired();
        return $token;
    }

    private function acquire(string $key, string $endpoint, DeadlineAwareClient $client, Deadline $deadline, int $httpVersion, ?string $rejectedToken): OAuthToken
    {
        $deadline->throwIfExpired();
        // Shared storage is authoritative; re-read it under the lock rather than using local state.
        $entry = $this->cache !== null
            ? $this->cache->get($key, $deadline)
            : ($this->endpoint === $endpoint ? $this->entry : null);
        $deadline->throwIfExpired();
        if ($entry !== null && $entry->token->accessToken !== $rejectedToken && $entry->renewAt > $this->now())
        {
            return $entry->token;
        }

        $this->entry = null;
        if ($this->cache !== null)
        {
            $this->cache->set($key, null, $deadline);
        }
        $deadline->throwIfExpired();
        $requestedAt = $this->now();
        $response = $client->postWithDeadline($endpoint, 'grant_type=client_credentials', [
            $this->authorization,
            'Content-Type: application/x-www-form-urlencoded',
            'Accept: application/json',
        ], $deadline, $httpVersion);
        $deadline->throwIfExpired();

        // Do not include token responses or credentials in exception messages.
        if ($response->code < 200 || $response->code >= 300)
        {
            throw new ClientException('OAuth token acquisition failed (HTTP ' . $response->code . ').', $response->code);
        }
        $body = $response->body;
        if (!is_array($body) || !isset($body['access_token'], $body['expires_in'], $body['token_type'])
            || !is_string($body['access_token']) || $body['access_token'] === ''
            || preg_match('/[\x00-\x20\x7f]/', $body['access_token'])
            || !is_int($body['expires_in']) || $body['expires_in'] <= 0
            || !is_string($body['token_type']) || strcasecmp($body['token_type'], 'Bearer') !== 0)
        {
            throw new ClientException('The OAuth endpoint returned an invalid token response.');
        }

        $expiresAt = \DateTimeImmutable::createFromFormat('U.u', sprintf('%.6F', $requestedAt + $body['expires_in']));
        if ($expiresAt === false)
        {
            throw new ClientException('The OAuth endpoint returned an invalid token expiry.');
        }
        $entry = new OAuthTokenCacheEntry(
            new OAuthToken($body['access_token'], $expiresAt),
            $requestedAt + $body['expires_in'] - min(10, floor($body['expires_in'] / 10))
        );
        $deadline->throwIfExpired();
        if ($this->cache !== null)
        {
            $this->cache->set($key, $entry, $deadline);
        }
        $deadline->throwIfExpired();
        $this->endpoint = $endpoint;
        $this->entry = $entry;
        return $entry->token;
    }

    /** Clock seam for deterministic expiry tests. */
    protected function now(): float
    {
        return microtime(true);
    }
}
