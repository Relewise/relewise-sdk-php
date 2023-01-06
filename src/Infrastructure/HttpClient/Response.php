<?php declare(strict_types=1);
namespace Relewise\Infrastructure\HttpClient;

class Response
{
    public function __construct(mixed $body, int $code, ?string $contentType)
    {
        $this->body = $body;
        $this->code = $code;
        $this->contentType = $contentType;
    }

    public mixed $body;
    public int $code;
    public ?string $contentType;
}
