<?php declare(strict_types=1);

namespace Relewise\Infrastructure\HttpClient;

class Response
{
    public function __construct(mixed $body, int $code)
    {
        $this->body = $body;
        $this->code = $code;
        $this->header = $header;
    }

    public mixed $body;
    public int $code;
}
