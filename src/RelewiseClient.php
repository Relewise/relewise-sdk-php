<?php
namespace Relewise;
use Relewise\Infrastructure\HttpClient\Client;
use Relewise\Infrastructure\HttpClient\CurlClient;
use Relewise\Infrastructure\HttpClient\Response;
use Relewise\Models\DTO\LicensedRequest;

abstract class RelewiseClient {
    private string $serverUrl = "https://api.relewise.com";
    private string $apiVersion = "v1";
    private Client $client;

    public function __construct(private string $datasetId, private string $apiKey)
    {
        $this->client = new CurlClient();
    }

    public function request($endpoint, LicensedRequest $request): Response 
    {
        return $this->client->post(
            $this->createRequestUrl($this->serverUrl, $this->datasetId, $this->apiVersion, $endpoint), 
            str_replace("\"type\":", "\"\$type\":", json_encode($request)),
            array("Authorization: ApiKey " . $this->apiKey, "Content-Type: application/json")
        );
    }

    private function createRequestUrl(string $baseUrl, ...$segments): string
    {
        $joinedSegments = implode("/",$segments);
        return str_ends_with($baseUrl, "/")
            ? $baseUrl . $joinedSegments
            : $baseUrl . "/" . $joinedSegments;
    }
}
