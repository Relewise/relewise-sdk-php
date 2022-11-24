<?php
namespace Relewise;
use Relewise\Infrastructure\HttpClient\Client;
use Relewise\Infrastructure\HttpClient\CurlClient;
use Relewise\Infrastructure\HttpClient\Response;

abstract class RelewiseClient {

    private string $serverUrl = "https://api.relewise.com";
    private string $apiVersion = "v1";
    private Client $client;

    public function __construct(private string $datasetId, private string $apiKey)
    {
        $this->client = new CurlClient();
    }

    protected function doRequest($body): Response 
    {
        return $this->client->post(
            $this->createRequestUrl($this->serverUrl, $this->datasetId, $this->apiVersion, "TrackProductViewRequest"), 
            json_encode($body, JSON_FORCE_OBJECT),
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
