<?php declare(strict_types=1);
namespace Relewise\Infrastructure\HttpClient;
use Relewise\Infrastructure\HttpClient\ClientException;
use Relewise\Infrastructure\HttpClient\Response;

/** @internal Shared cURL execution; legacy subclasses do not gain deadline capability. */
trait CurlExecution
{
    /** @var \CurlHandle|null */
    private $curl;

    public function __construct()
    {
        if (!\function_exists('curl_init')) {
            throw new ClientException('curl not loaded');
        }

        $this->curl = curl_init();
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
    private function call($url, $method = self::METHOD_GET, array $header = [], $data = null, int $timeout = 3, int $httpVersion = CURL_HTTP_VERSION_NONE, ?Deadline $deadline = null): Response
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

        $headers = [];
        curl_setopt($this->curl, CURLOPT_HEADERFUNCTION, static function ($curl, string $line) use (&$headers): int {
            if (preg_match('/^HTTP\/\S+\s+\d{3}/i', $line))
            {
                // Keep only the final response's headers (e.g. after 100 Continue).
                $headers = [];
            }
            elseif (str_contains($line, ':'))
            {
                [$name, $value] = explode(':', $line, 2);
                $headers[strtolower(trim($name))][] = trim($value);
            }
            return strlen($line);
        });

        if ($deadline !== null)
        {
            $milliseconds = $deadline->remainingMilliseconds();
            curl_setopt($this->curl, CURLOPT_CONNECTTIMEOUT_MS, $milliseconds);
            curl_setopt($this->curl, CURLOPT_TIMEOUT_MS, $milliseconds);
        }
        $content = curl_exec($this->curl);
        $deadline?->throwIfExpired();

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
        if (json_last_error() !== JSON_ERROR_NONE) {
            $body = $content === '' ? null : $content;
        }

        $deadline?->throwIfExpired();
        return new Response($body, $httpCode, $contentType ? $contentType : null, $headers);
    }
}
