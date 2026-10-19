<?php declare(strict_types=1);

namespace Relewise;

use Relewise\Infrastructure\HttpClient\Client;
use Relewise\Infrastructure\HttpClient\ClientException;

/** Acquires client-credentials tokens. Reuse the provider to share its in-memory cache. */
class OAuthTokenProvider
{
    private string $authorization;
    private ?string $endpoint = null;
    private ?OAuthToken $token = null;
    private float $renewAt = 0;

    public function __construct(string $clientId, string $clientSecret)
    {
        if (!preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/i', $clientId)
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
     * The timeout applies to the token HTTP request, as it does to other PHP SDK HTTP requests.
     */
    public function getToken(
        string $endpoint,
        Client $client,
        int $timeout = 5,
        int $httpVersion = CURL_HTTP_VERSION_NONE,
        ?string $rejectedToken = null
    ): OAuthToken {
        if ($timeout < 1 || !filter_var($endpoint, FILTER_VALIDATE_URL)
            || strtolower((string) parse_url($endpoint, PHP_URL_SCHEME)) !== 'https'
            || parse_url($endpoint, PHP_URL_USER) !== null || parse_url($endpoint, PHP_URL_PASS) !== null
            || parse_url($endpoint, PHP_URL_QUERY) !== null || parse_url($endpoint, PHP_URL_FRAGMENT) !== null)
        {
            throw new \InvalidArgumentException('OAuth requires a positive timeout and an HTTPS token endpoint without credentials, query, or fragment.');
        }
        if ($this->endpoint === $endpoint && $this->token !== null
            && $this->token->accessToken !== $rejectedToken && $this->renewAt > $this->now())
        {
            return $this->token;
        }

        $this->token = null;
        $requestedAt = $this->now();
        $response = $client->post($endpoint, 'grant_type=client_credentials', [
            $this->authorization,
            'Content-Type: application/x-www-form-urlencoded',
            'Accept: application/json',
        ], $timeout, $httpVersion);

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
        $this->endpoint = $endpoint;
        $this->renewAt = $requestedAt + $body['expires_in'] - min(10, $body['expires_in'] / 10);
        return $this->token = new OAuthToken($body['access_token'], $expiresAt);
    }

    /** Clock seam for deterministic expiry tests. */
    protected function now(): float
    {
        return microtime(true);
    }
}
