<?php declare(strict_types=1);
namespace Relewise\Infrastructure\HttpClient;
use Relewise\Infrastructure\HttpClient\ClientException;
use Relewise\Infrastructure\HttpClient\Response;

class CurlClient implements Client
{
    private const METHOD_GET = 'GET';
    private const METHOD_POST = 'POST';

    /**
     * @var string[]
     */
    protected $validMethods = [
        self::METHOD_POST,
    ];

    /** @var \CurlHandle|null */
    private $curl;

    public function __construct()
    {
        if (!\function_exists('curl_init')) {
            throw new ClientException('curl not loaded');
        }

        $this->curl = curl_init();
    }

    public function __destruct()
    {
        if ($this->curl instanceof \CurlHandle) {
            curl_close($this->curl);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function post($url, $data = null, array $header = [], int $timeout = 3, int $httpVersion = CURL_HTTP_VERSION_NONE): Response
    {
        return $this->call($url, self::METHOD_POST, $header, $data, $timeout, $httpVersion);
    }

    /**
     * @param string       $url
     * @param string       $method
     * @param string[]     $header
     * @param string|array $data
     *
     * @throws ClientException
     *
     * @return Response
     */
    private function call($url, $method = self::METHOD_GET, array $header = [], $data = null, int $timeout = 3, int $httpVersion = CURL_HTTP_VERSION_NONE): Response
    {
        if (!\in_array($method, $this->validMethods, true)) {
            throw new ClientException('Invalid HTTP-METHOD: ' . $method);
        }

        if (!filter_var($url, \FILTER_VALIDATE_URL)) {
            throw new ClientException('Invalid URL given');
        }

        curl_reset($this->curl);

        curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_POST, 1);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($this->curl, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($this->curl, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($this->curl, CURLOPT_HTTP_VERSION, $httpVersion);

        $content = curl_exec($this->curl);

        $error = curl_errno($this->curl);
        $errmsg = curl_error($this->curl);
        $httpCode = curl_getinfo($this->curl, \CURLINFO_HTTP_CODE);
        $contentType = curl_getinfo($this->curl, \CURLINFO_CONTENT_TYPE);

        if ($content === false && $error == 28) {
            throw new RequestTimeoutException($errmsg, $error);
        }

        if ($content === false) {
            throw new ClientException($errmsg, $error);
        }

        $body = json_decode($content, true);

        return new Response($body, $httpCode, $contentType ? $contentType : null);
    }
}