<?php declare(strict_types=1);
namespace Relewise\Infrastructure\HttpClient;

interface Client
{
    /**
     * @param string       $url
     * @param string|array $data
     * @param string[]     $header
     *
     * @return Response
     */
    public function post($url, $data = null, array $header = [], int $timeout, int $httpVersion = CURL_HTTP_VERSION_NONE): Response;
}
