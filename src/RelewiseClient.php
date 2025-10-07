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
use Relewise\Models\LicensedRequest;

abstract class RelewiseClient
{
    private string $apiKeyNotDefinedMessage = "apiKey must not be empty.";
    public string $serverUrl = "https://api.relewise.com";
    private int $httpVersion = CURL_HTTP_VERSION_NONE;
    private string $apiVersion = "v1";
    private string $clientName = "RelewisePHPClient";
    private string $clientVersion;
    private Client $client;
    protected int $batchSize = 100;

    public function __construct(private string $datasetId, private string $apiKey, private int $timeout)
    {
        if (trim($apiKey) == "")
        {
            throw new InvalidArgumentException($this->apiKeyNotDefinedMessage);
        }
        $this->clientVersion = \Composer\InstalledVersions::getRootPackage()["version"];
        $this->client = new CurlClient();
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
        return $this->client->post(
            $this->createRequestUrl($this->serverUrl, $this->datasetId, $this->apiVersion, $endpoint),
            str_replace("\"typeDefinition\":", "\"\$type\":", json_encode($request)),
            array(
                "Authorization: ApiKey " . $this->apiKey,
                "Content-Type: application/json",
                "User-Agent: " . $this->clientName . "/" . $this->clientVersion
            ),
            $this->timeout,
            $this->httpVersion
        );
    }

    public function requestAndValidate(string $endpoint, LicensedRequest $request)
    {
        if (trim($this->apiKey) == "")
        {
            throw new InvalidArgumentException($this->apiKeyNotDefinedMessage);
        }
        $response = $this->request($endpoint, $request);
        if ($response->code >= 200 && $response->code <= 299) {
            return $response->body;
        }
        if ($response->code == 401)
        {
            throw new UnauthorizedException(json_encode($response->body), $response->code);
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
}
