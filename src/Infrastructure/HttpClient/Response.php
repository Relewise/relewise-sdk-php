<?php declare(strict_types=1);
namespace Relewise\Infrastructure\HttpClient;

class Response
{
    /** @param array<string, string[]> $headers Response header names and all their values. */
    public function __construct(mixed $body, int $code, ?string $contentType, array $headers = [])
    {
        $this->body = $body;
        $this->code = $code;
        $this->contentType = $contentType;
        $this->headers = $headers;
    }

    public mixed $body;
    public int $code;
    public ?string $contentType;
    /** @var array<string, string[]> */
    public array $headers;

    /** @return string[] */
    public function getHeaderValues(string $name): array
    {
        $values = [];
        foreach ($this->headers as $header => $headerValues)
        {
            if (strcasecmp($header, $name) === 0)
            {
                array_push($values, ...$headerValues);
            }
        }
        return $values;
    }
}
