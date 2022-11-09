<?php declare(strict_types=1);

namespace Relewise\Infrastructure\HttpClient;

interface Client
{
    /**
     * @param string   $url
     * @param string[] $header
     *
     * @return Response
     */
    public function get($url, array $header = []): Response;

    /**
     * @param string       $url
     * @param string|array $data
     * @param string[]     $header
     *
     * @return Response
     */
    public function post($url, $data = null, array $header = []): Response;

    /**
     * @param string       $url
     * @param string|array $data
     * @param string[]     $header
     *
     * @return Response
     */
    public function put($url, $data = null, array $header = []): Response;

    /**
     * @param string       $url
     * @param string|array $data
     * @param string[]     $header
     *
     * @return Response
     */
    public function delete(string $url, $data = null, array $header = []): Response;
}