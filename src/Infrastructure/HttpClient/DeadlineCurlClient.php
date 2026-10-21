<?php declare(strict_types=1);

namespace Relewise\Infrastructure\HttpClient;

/** Default OAuth transport. Like CurlClient, it does not follow redirects. */
final class DeadlineCurlClient implements DeadlineAwareClient
{
    private const METHOD_GET = 'GET';
    private const METHOD_POST = 'POST';
    /** @var string[] */
    protected $validMethods = [self::METHOD_POST];

    use CurlExecution;

    public function post($url, $data = null, array $header = [], int $timeout = 3, int $httpVersion = CURL_HTTP_VERSION_NONE): Response
    {
        return $this->postWithDeadline($url, $data, $header, new Deadline($timeout), $httpVersion);
    }

    public function postWithDeadline($url, $data, array $header, Deadline $deadline, int $httpVersion = CURL_HTTP_VERSION_NONE): Response
    {
        $deadline->throwIfExpired();
        return $this->call($url, self::METHOD_POST, $header, $data, 3, $httpVersion, $deadline);
    }
}
