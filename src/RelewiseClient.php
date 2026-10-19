<?php

namespace Relewise;

use InvalidArgumentException;
use Relewise\Infrastructure\HttpClient\BadRequestException;
use Relewise\Infrastructure\HttpClient\Client;
use Relewise\Infrastructure\HttpClient\ClientException;
use Relewise\Infrastructure\HttpClient\CurlClient;
use Relewise\Infrastructure\HttpClient\InternalServerErrorException;
use Relewise\Infrastructure\HttpClient\ProblemDetailsException;
use Relewise\Infrastructure\HttpClient\Response;
use Relewise\Infrastructure\HttpClient\ServiceUnavailableException;
use Relewise\Infrastructure\HttpClient\UnauthorizedException;
use Relewise\Infrastructure\HttpClient\OAuthChallenge;
use Relewise\Models\LicensedRequest;

abstract class RelewiseClient
{
    protected const OAUTH_DEFAULT_TIMEOUT = 5;
    private string $apiKeyNotDefinedMessage = "apiKey must not be empty.";
    private string $unauthorizedMessage = "Unauthorized. Verify that:";
    public string $serverUrl = "https://api.relewise.com";
    private int $httpVersion = CURL_HTTP_VERSION_NONE;
    private string $apiVersion = "v1";
    private string $clientName = "RelewisePHPClient";
    private string $clientVersion;
    private Client $client;
    protected int $batchSize = 1000;

    public function __construct(private string $datasetId, private string $apiKey, private int $timeout, private ?OAuthTokenProvider $oauthTokenProvider = null)
    {
        if ($oauthTokenProvider === null && trim($apiKey) == "")
        {
            throw new InvalidArgumentException($this->apiKeyNotDefinedMessage);
        }
        if ($oauthTokenProvider !== null && ($apiKey !== '' || trim($datasetId) === '' || $timeout < 1))
        {
            throw new InvalidArgumentException('OAuth requires an empty apiKey, a datasetId, and a positive timeout.');
        }
        if (class_exists(\Composer\InstalledVersions::class))
        {
            $this->clientVersion = \Composer\InstalledVersions::getRootPackage()["version"];
        }
        else
        {
            $this->clientVersion = "dev";
        }
        $this->client = new CurlClient();
    }

    /**
     * Create a backend client using OAuth client credentials. Reuse it to cache tokens.
     * The timeout is per HTTP exchange, including token acquisition and the optional retry.
     */
    public static function createWithOAuth(string $datasetId, string $clientId, string $clientSecret, string $serverUrl, ?int $timeout = null): static
    {
        if (!filter_var($serverUrl, FILTER_VALIDATE_URL)
            || strtolower((string) parse_url($serverUrl, PHP_URL_SCHEME)) !== 'https'
            || parse_url($serverUrl, PHP_URL_USER) !== null || parse_url($serverUrl, PHP_URL_PASS) !== null
            || parse_url($serverUrl, PHP_URL_QUERY) !== null || parse_url($serverUrl, PHP_URL_FRAGMENT) !== null)
        {
            throw new InvalidArgumentException('serverUrl must be an HTTPS URL without credentials, query, or fragment.');
        }
        $client = new static($datasetId, '', $timeout ?? static::OAUTH_DEFAULT_TIMEOUT, new OAuthTokenProvider($clientId, $clientSecret));
        $client->serverUrl = $serverUrl;
        return $client;
    }

    public function setBatchSize(int $batchSize)
    {
        if ($batchSize < 1)
        {
            throw new InvalidArgumentException("batchSize must be greater than 0.");
        }
        $this->batchSize = $batchSize;
    }

    public function getBatchSize(): int
    {
        return $this->batchSize;
    }

    /**
     * @param array<int, mixed> $items
     * @return array<int, array<int, mixed>>
     */
    protected function createBatches(array $items): array
    {
        $count = count($items);
        if ($count === 0)
        {
            return array();
        }
        if ($count <= $this->batchSize)
        {
            return array($items);
        }

        $chunks = array();
        for ($offset = 0; $offset < $count; $offset += $this->batchSize)
        {
            $chunks[] = \array_slice($items, $offset, $this->batchSize);
        }

        return $chunks;
    }

    public function request(string $endpoint, LicensedRequest $request): Response
    {
        $url = $this->createRequestUrl($this->serverUrl, $this->datasetId, $this->apiVersion, $endpoint);
        $body = str_replace("\"typeDefinition\":", "\"\$type\":", json_encode($request));
        if ($this->oauthTokenProvider !== null)
        {
            $tokenEndpoint = $this->createRequestUrl($this->serverUrl, $this->datasetId, 'oauth/token');
            $token = $this->oauthTokenProvider->getToken($tokenEndpoint, $this->client, $this->timeout, $this->httpVersion);
            $response = $this->sendRequest($url, $body, 'Bearer ' . $token->accessToken);
            if (OAuthChallenge::isInvalidToken($response))
            {
                $token = $this->oauthTokenProvider->getToken($tokenEndpoint, $this->client, $this->timeout, $this->httpVersion, $token->accessToken);
                return $this->sendRequest($url, $body, 'Bearer ' . $token->accessToken);
            }
            return $response;
        }
        return $this->sendRequest($url, $body, 'ApiKey ' . $this->apiKey);
    }

    private function sendRequest(string $url, string $body, string $authorization): Response
    {
        return $this->client->post(
            $url,
            $body,
            array(
                "Authorization: " . $authorization,
                "Content-Type: application/json",
                "User-Agent: " . $this->clientName . "/" . $this->clientVersion
            ),
            $this->timeout,
            $this->httpVersion
        );
    }

    public function requestAndValidate(string $endpoint, LicensedRequest $request)
    {
        if ($this->oauthTokenProvider === null && trim($this->apiKey) == "")
        {
            throw new InvalidArgumentException($this->apiKeyNotDefinedMessage);
        }
        $response = $this->request($endpoint, $request);
        if ($response->code >= 200 && $response->code <= 299) {
            return $response->body;
        }
        if ($response->code == 401)
        {
            throw new UnauthorizedException($this->createUnauthorizedMessage($endpoint, $response->body), $response->code);
        }
        if ($response->code == 503)
        {
            throw new ServiceUnavailableException(json_encode($response->body), $response->code);
        }
        if ($response->code == 500)
        {
            throw new InternalServerErrorException(json_encode($response->body), $response->code);
        }
        if ($response->code == 400)
        {
            if ($response->contentType == "application/problem+json")
            {
                throw new ProblemDetailsException(json_encode($response->body), $response->code);
            }
            else
            {
                throw new BadRequestException(json_encode($response->body), $response->code);
            }
        }
        throw new ClientException(json_encode($response->body), $response->code);
    }

    /**
     * Set the HTTP Version for the requests made to the API.
     * @param int $httpVersion should be either CURL_HTTP_VERSION_NONE, CURL_HTTP_VERSION_1_1, CURL_HTTP_VERSION_2_0, or CURL_HTTP_VERSION_2TLS
     * @return void
     */
    public function setHttpVersion(int $httpVersion)
    {
        if ($httpVersion == 0 || $httpVersion == 2 || $httpVersion == 3 || $httpVersion == 4) {
            $this->httpVersion = $httpVersion;
        }
        else {
            throw new InvalidArgumentException("The supplied httpVersion code was not among valid values. It as " + $httpVersion + " but the expected was 0, 2, 3, or 4.");
        }
    }

    private function createRequestUrl(string $baseUrl, ...$segments): string
    {
        $joinedSegments = implode("/", $segments);
        return str_ends_with($baseUrl, "/")
            ? $baseUrl . $joinedSegments
            : $baseUrl . "/" . $joinedSegments;
    }

    private function createUnauthorizedMessage(string $endpoint, mixed $responseBody): string
    {
        $responseMessage = is_string($responseBody)
            ? $responseBody
            : ($responseBody === null ? null : json_encode($responseBody));

        if ($responseMessage !== null && $responseMessage !== false && $responseMessage !== "")
        {
            return $responseMessage;
        }

        if ($this->oauthTokenProvider !== null)
        {
            return $this->unauthorizedMessage . PHP_EOL
                . "- the OAuth credentials are valid and have permission to call " . $endpoint . PHP_EOL
                . "- the datasetId and serverUrl match the intended OAuth credentials and environment";
        }
        return $this->unauthorizedMessage . PHP_EOL
            . "- a valid API key has been provided" . PHP_EOL
            . "- the API key has permission to call " . $endpoint . PHP_EOL
            . "- the datasetId and serverUrl are correct for the API key, including matching the intended environment";
    }
}
