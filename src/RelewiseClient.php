<?php

namespace Relewise;

use MessagePack\MessagePack;
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
use Relewise\Models\TimedResponse;

abstract class RelewiseClient
{
    public string $serverUrl = "https://host.docker.internal:5000";
    private string $apiVersion = "v1";
    private Client $client;

    public function __construct(private string $datasetId, private string $apiKey)
    {
        $this->client = new CurlClient();
    }

    public function request(string $endpoint, LicensedRequest $request): Response
    {
        return $this->client->post(
            $this->createRequestUrl($this->serverUrl, $this->datasetId, $this->apiVersion, $endpoint),
            MessagePack::pack($this->object_to_array($request)),
            array("Authorization: ApiKey " . $this->apiKey, "Content-Type: application/x-msgpack")
        );
    }

    private function object_to_array($obj) {
        //only process if it's an object or array being passed to the function
        if(is_object($obj) || is_array($obj)) {
            $ret = (array) $obj;
            foreach($ret as &$item) {
                //recursively process EACH element regardless of type
                $item = $this->object_to_array($item);
            }
            return $ret;
        }
        //otherwise (i.e. for scalar values) return without modification
        else {
            return $obj;
        }
    }

    public function requestAndValidate(string $endpoint, LicensedRequest $request)
    {
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

    private function createRequestUrl(string $baseUrl, ...$segments): string
    {
        $joinedSegments = implode("/", $segments);
        return str_ends_with($baseUrl, "/")
            ? $baseUrl . $joinedSegments
            : $baseUrl . "/" . $joinedSegments;
    }
}
