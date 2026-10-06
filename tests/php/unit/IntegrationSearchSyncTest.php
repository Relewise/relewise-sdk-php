<?php declare(strict_types=1);

namespace Relewise\Tests\Unit;

require_once dirname(__DIR__, 2) . '/support/IntegrationSearchSync.php';

use PHPUnit\Framework\TestCase;
use Relewise\Infrastructure\HttpClient\Client;
use Relewise\Infrastructure\HttpClient\Response;
use Relewise\Tests\Integration\IntegrationSearchSync;
use RuntimeException;

// Mock HTTP responses verify ordering and failures without credentials or real dataset changes.
class IntegrationSearchSyncTest extends TestCase
{
    public function testRebuildCompletesBeforeAllCandidateCachesAreRefreshed(): void
    {
        $client = $this->createMock(Client::class);
        $call = 0;
        $client->expects(self::exactly(2))->method('post')->willReturnCallback(
            function ($url, $data, $headers, $timeout) use (&$call): Response {
                self::assertSame(120, $timeout);
                self::assertContains('Authorization: APIKey test-key', $headers);
                self::assertContains('Content-Type: application/json', $headers);
                self::assertContains('Accept: application/json', $headers);
                if ($call++ === 0) {
                    self::assertSame('https://example.com/dataset/ui/RebuildSearchIndexRequest', $url);
                    self::assertSame(['IndexId' => 'default'], json_decode($data, true));
                    return new Response(['rebuildTimeMs' => 0], 200, 'application/json');
                }
                self::assertSame('https://example.com/dataset/ui/RefreshPresorterRequest', $url);
                self::assertSame(['Fill' => true, 'Popular' => true, 'Fallback' => true], json_decode($data, true));
                return new Response(['refreshTimeMs' => 12.5], 200, 'application/json');
            }
        );
        (new IntegrationSearchSync($client))->synchronize('https://example.com/', 'dataset', 'test-key');
        self::assertSame(2, $call);
    }

    public function testFailedRebuildStopsBeforeRefresh(): void
    {
        $client = $this->createMock(Client::class);
        $client->expects(self::once())->method('post')->willReturn(new Response('busy', 503, 'text/plain'));
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('RebuildSearchIndexRequest failed with HTTP 503');
        (new IntegrationSearchSync($client))->synchronize('https://example.com', 'dataset', 'test-key');
    }

    public function testMalformedRebuildStopsBeforeRefresh(): void
    {
        $client = $this->createMock(Client::class);
        $client->expects(self::once())->method('post')->willReturn(new Response([], 200, 'application/json'));
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('invalid rebuildTimeMs');
        (new IntegrationSearchSync($client))->synchronize('https://example.com', 'dataset', 'test-key');
    }

    public function testRefreshFailuresArePropagated(): void
    {
        $client = $this->createMock(Client::class);
        $client->expects(self::exactly(2))->method('post')->willReturnOnConsecutiveCalls(
            new Response(['rebuildTimeMs' => 1], 200, 'application/json'),
            new Response('unauthorized', 401, 'text/plain')
        );
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('RefreshPresorterRequest failed with HTTP 401');
        (new IntegrationSearchSync($client))->synchronize('https://example.com', 'dataset', 'test-key');
    }

    public function testInvalidRefreshDurationFailsSynchronization(): void
    {
        $client = $this->createMock(Client::class);
        $client->expects(self::exactly(2))->method('post')->willReturnOnConsecutiveCalls(
            new Response(['rebuildTimeMs' => 1], 200, 'application/json'),
            new Response(['refreshTimeMs' => -1], 200, 'application/json')
        );
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('invalid refreshTimeMs');
        (new IntegrationSearchSync($client))->synchronize('https://example.com', 'dataset', 'test-key');
    }

    public function testTransportFailureStopsBeforeRefresh(): void
    {
        $client = $this->createMock(Client::class);
        $client->expects(self::once())->method('post')->willThrowException(new RuntimeException('timeout'));
        $this->expectExceptionMessage('timeout');
        (new IntegrationSearchSync($client))->synchronize('https://example.com', 'dataset', 'test-key');
    }
}
