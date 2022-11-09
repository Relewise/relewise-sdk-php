<?php declare(strict_types=1);

namespace Relewise\Infrastructure\HttpClient;

class Response
{
    public function __construct(string $body, int $code, string $header)
    {
        $this->body = $body;
        $this->code = $code;
        $this->header = $header;
    }

    public string $body;
    public int $code;
    public string $header;
}