<?php declare(strict_types=1);

namespace Relewise\Tests\Integration;

use Relewise\Infrastructure\HttpClient\Client;
use Relewise\Infrastructure\HttpClient\CurlClient;
use RuntimeException;

/** Test-only access to the synchronous, master-key UI operations. */
final class IntegrationSearchSync
{
    // Unit tests inject a fake client; integration tests use the real synchronous CurlClient.
    public function __construct(private ?Client $client = null)
    {
    }

    public function synchronize(string $serverUrl, string $datasetId, string $apiKey): void
    {
        if (trim($datasetId) === '' || trim($apiKey) === '') {
            throw new RuntimeException('Integration search synchronization requires DATASET_ID and a master API_KEY');
        }
        $client = $this->client ?? new CurlClient();
        $baseUrl = rtrim($serverUrl, '/') . '/' . $datasetId . '/ui/';
        $headers = ['Authorization: APIKey ' . $apiKey, 'Content-Type: application/json', 'Accept: application/json'];
        // Termless searches also need fresh presorted candidates, so rebuild alone is insufficient.
        foreach ([
            ['RebuildSearchIndexRequest', ['IndexId' => 'default'], 'rebuildTimeMs'],
            ['RefreshPresorterRequest', ['Fill' => true, 'Popular' => true, 'Fallback' => true], 'refreshTimeMs'],
        ] as [$operation, $body, $durationField]) {
            // post() blocks until the operation completes; refresh must follow rebuild.
            $response = $client->post($baseUrl . $operation, json_encode($body, JSON_THROW_ON_ERROR), $headers, 120);
            if ($response->code < 200 || $response->code >= 300) {
                throw new RuntimeException($operation . ' failed with HTTP ' . $response->code . ': ' . json_encode($response->body));
            }
            // Require the completion payload as well as HTTP success before searching.
            $duration = is_array($response->body) ? ($response->body[$durationField] ?? null) : null;
            if ((!is_int($duration) && !is_float($duration)) || !is_finite((float) $duration) || $duration < 0) {
                throw new RuntimeException($operation . ' returned an invalid ' . $durationField);
            }
        }
    }
}
