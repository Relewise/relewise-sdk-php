<?php declare(strict_types=1);

namespace Relewise\Infrastructure\HttpClient;

interface DeadlineAwareClient extends Client
{
    /**
     * Use the remaining deadline for all preparation, waiting, redirects and retries.
     * Keep authentication on this request and do not forward it to another origin.
     * @param string $url
     * @param string|array|null $data
     * @param string[] $header
     */
    public function postWithDeadline($url, $data, array $header, Deadline $deadline, int $httpVersion = CURL_HTTP_VERSION_NONE): Response;
}
