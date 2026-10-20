<?php declare(strict_types=1);

namespace Relewise\Tests\Unit;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use Relewise\Infrastructure\HttpClient\{CurlClient, Deadline, DeadlineCurlClient, OAuthChallenge, RequestTimeoutException};

class OAuthCurlTest extends TestCase
{
    public static function transports(): iterable
    {
        yield [CurlClient::class];
        yield [DeadlineCurlClient::class];
    }

    #[DataProvider('transports')]
    public function testCurlRetainsFinalRepeatedHeadersAndResetsBetweenRequests(string $class): void
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
            $client = new $class();
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

    #[DataProvider('transports')]
    public function testDefaultRedirectPolicyDoesNotForwardBasicOrBearerCredentials(string $class): void
    {
        $process = proc_open([PHP_BINARY, __DIR__ . '/../fixtures/oauth-http-server.php', 'redirect'],
            [0 => ['pipe', 'r'], 1 => ['pipe', 'w'], 2 => ['pipe', 'w']], $pipes);
        self::assertIsResource($process);
        try
        {
            stream_set_timeout($pipes[1], 10);
            $address = trim((string) fgets($pipes[1]));
            $client = new $class();
            foreach (['Basic dummy-credentials', 'Bearer dummy-token'] as $authorization)
            {
                $response = $client->post('http://' . $address, '{}', ['Authorization: ' . $authorization], 1);
                self::assertSame(302, $response->code);
            }
            self::assertSame("no redirect\n", fgets($pipes[1]));
        }
        finally
        {
            foreach ($pipes as $pipe) { fclose($pipe); }
            proc_terminate($process);
            proc_close($process);
        }
    }

    public function testCurlEnforcesRemainingMillisecondsAfterPreparation(): void
    {
        $process = proc_open([PHP_BINARY, __DIR__ . '/../fixtures/oauth-http-server.php', 'delay'],
            [0 => ['pipe', 'r'], 1 => ['pipe', 'w'], 2 => ['pipe', 'w']], $pipes);
        self::assertIsResource($process);
        try
        {
            stream_set_timeout($pipes[1], 10);
            $address = trim((string) fgets($pipes[1]));
            $deadline = new Deadline(1);
            usleep(600000);
            $start = hrtime(true);
            try
            {
                (new DeadlineCurlClient())->postWithDeadline('http://' . $address, '{}', [], $deadline);
                self::fail('The transfer should exceed its remaining allowance.');
            }
            catch (RequestTimeoutException $exception)
            {
                // A new one-second budget would wait for the server's 800 ms response.
                self::assertLessThan(0.75, (hrtime(true) - $start) / 1e9);
            }
        }
        finally
        {
            foreach ($pipes as $pipe) { fclose($pipe); }
            proc_terminate($process);
            proc_close($process);
        }
    }
}
