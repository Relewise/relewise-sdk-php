<?php declare(strict_types=1);

namespace Relewise\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Relewise\Infrastructure\HttpClient\{CurlClient, OAuthChallenge};

class OAuthCurlTest extends TestCase
{
    public function testCurlRetainsFinalRepeatedHeadersAndResetsBetweenRequests(): void
    {
        if (!function_exists('proc_open')) { self::markTestSkipped('proc_open is needed for the loopback HTTP fixture.'); }
        $process = proc_open([PHP_BINARY, __DIR__ . '/../fixtures/oauth-http-server.php'],
            [0 => ['pipe', 'r'], 1 => ['pipe', 'w'], 2 => ['pipe', 'w']], $pipes);
        self::assertIsResource($process);
        try
        {
            stream_set_timeout($pipes[1], 10);
            $address = trim((string) fgets($pipes[1]));
            self::assertMatchesRegularExpression('/^127\.0\.0\.1:\d+$/', $address);
            $client = new CurlClient();
            $first = $client->post('http://' . $address, '{}', ['Content-Type: application/json'], 5);
            self::assertSame(401, $first->code);
            self::assertCount(2, $first->getHeaderValues('WWW-Authenticate'));
            self::assertSame([], $first->getHeaderValues('X-Interim'));
            self::assertTrue(OAuthChallenge::isInvalidToken($first));
            self::assertSame([], $first->body);
            $second = $client->post('http://' . $address, '{}', [], 5);
            self::assertSame(200, $second->code);
            self::assertSame([], $second->getHeaderValues('WWW-Authenticate'));
        }
        finally
        {
            foreach ($pipes as $pipe) { fclose($pipe); }
            proc_terminate($process);
            proc_close($process);
        }
    }
}
