<?php declare(strict_types=1);
namespace Relewise\Infrastructure\HttpClient;

class CurlClient implements Client
{
    private const METHOD_GET = 'GET';
    private const METHOD_POST = 'POST';
    /** @var string[] */
    protected $validMethods = [self::METHOD_POST];

    use CurlExecution;

    public function post($url, $data = null, array $header = [], int $timeout = 3, int $httpVersion = CURL_HTTP_VERSION_NONE): Response
    {
        return $this->call($url, self::METHOD_POST, $header, $data, $timeout, $httpVersion);
    }
}
