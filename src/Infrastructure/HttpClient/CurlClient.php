<?php declare(strict_types=1);

namespace Relewise\Infrastructure\HttpClient;
use Relewise\Infrastructure\HttpClient\ClientException;
use Relewise\Infrastructure\HttpClient\Response;

use function PHPUnit\Framework\isNull;

class CurlClient implements Client
{
    private const METHOD_GET = 'GET';
    private const METHOD_PUT = 'PUT';
    private const METHOD_POST = 'POST';
    private const METHOD_DELETE = 'DELETE';

    /**
     * @var string[]
     */
    protected $validMethods = [
        self::METHOD_POST,
    ];

    /**
     * {@inheritdoc}
     */
    public function post($url, $data = null, array $header = []): Response
    {
        return $this->call($url, self::METHOD_POST, $header, $data);
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
    private function call($url, $method = self::METHOD_GET, array $header = [], $data = null): Response
    {
        if (!\function_exists('curl_init')) {
            throw new ClientException('curl not loaded');
        }

        if (!\in_array($method, $this->validMethods, true)) {
            throw new ClientException('Invalid HTTP-METHOD: ' . $method);
        }

        if (!filter_var($url, \FILTER_VALIDATE_URL)) {
            throw new ClientException('Invalid URL given');
        }

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);           
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

        $content = curl_exec($curl);

        $error = curl_errno($curl);
        $errmsg = curl_error($curl);
        $httpCode = curl_getinfo($curl, \CURLINFO_HTTP_CODE);

        curl_close($curl);
        if ($content === false) {
            throw new ClientException($errmsg, $error);
        }

        $body = json_decode($content, true);

        return new Response($body, $httpCode);
    }
}