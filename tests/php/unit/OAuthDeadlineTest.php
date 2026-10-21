<?php declare(strict_types=1);

namespace Relewise\Tests\Unit;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Relewise\{OAuthTokenProvider, Searcher, Tracker};
use Relewise\Infrastructure\HttpClient\{Client, ClientException, CurlClient, Deadline, DeadlineAwareClient, DeadlineCurlClient, RequestTimeoutException, Response};
use Relewise\Models\{BatchedTrackingRequest, LicensedRequest, SearchRequestCollection, Trackable};

class OAuthDeadlineTest extends TestCase
{
    private const ID = '11111111-2222-3333-4444-555555555555';

    private static function token(string $token = 'token'): Response
    {
        return new Response(['access_token' => $token, 'expires_in' => 300, 'token_type' => 'bEaReR'], 200, null);
    }

    private static function rejected(): Response
    {
        return new Response(null, 401, null, ['WWW-Authenticate' => ['Bearer error="invalid_token"']]);
    }

    private function client(DeadlineTestTransport $transport): Searcher
    {
        return Searcher::createWithOAuth(self::ID, self::ID, 'secret', 'https://example.test/prefix/', 1, $transport);
    }

    public function testOneSecondBudgetDecreasesAcrossAllFourExchanges(): void
    {
        $transport = new DeadlineTestTransport([self::token(), self::rejected(), self::token('replacement'), new Response([], 200, null)], 20000);
        $this->client($transport)->request('search', SearchRequestCollection::create());
        self::assertCount(4, $transport->calls);
        $previous = 1000;
        foreach ($transport->calls as $call)
        {
            self::assertSame($transport->calls[0]['deadline'], $call['deadline']);
            self::assertGreaterThan(0, $call['remaining']);
            self::assertLessThan($previous, $call['remaining']);
            $previous = $call['remaining'];
        }
        self::assertSame('https://example.test/prefix/' . self::ID . '/oauth/token', $transport->calls[0]['url']);
        self::assertSame('https://example.test/prefix/' . self::ID . '/v1/search', $transport->calls[1]['url']);
    }

    #[DataProvider('exhaustionPoints')]
    public function testLateResultsPreventFurtherTrafficAndLateSuccess(int $slowCall): void
    {
        $responses = [self::token(), self::rejected(), self::token('replacement'), new Response([], 200, null)];
        $result = $responses[$slowCall];
        $responses[$slowCall] = function () use ($result): Response {
            usleep(1050000);
            return $result;
        };
        $transport = new DeadlineTestTransport($responses);
        try
        {
            $this->client($transport)->request('search', SearchRequestCollection::create());
            self::fail('A late transport result must not succeed.');
        }
        catch (RequestTimeoutException $exception)
        {
            self::assertCount($slowCall + 1, $transport->calls);
        }
    }

    public static function exhaustionPoints(): iterable
    {
        yield 'acquisition' => [0];
        yield 'API rejection' => [1];
        yield 'replacement' => [2];
        yield 'API retry success' => [3];
    }

    public function testSerializationUsesTheOperationBudget(): void
    {
        $request = new class extends LicensedRequest implements \JsonSerializable {
            public function jsonSerialize(): mixed
            {
                usleep(1050000);
                return ['payload' => 'prepared'];
            }
        };
        $transport = new DeadlineTestTransport([]);
        try
        {
            $this->client($transport)->request('search', $request);
            self::fail('Serialization must consume the deadline.');
        }
        catch (RequestTimeoutException $exception)
        {
            self::assertCount(0, $transport->calls);
        }
    }

    public function testExhaustedDeadlineNeverStartsCurl(): void
    {
        $deadline = new Deadline(1);
        usleep(1000000);
        $this->expectException(RequestTimeoutException::class);
        // An exhausted deadline must fail before URL validation or network activity.
        (new DeadlineCurlClient())->postWithDeadline('not-a-url', '', [], $deadline);
    }

    public function testStandaloneAcquisitionUsesItsOwnDeadline(): void
    {
        $transport = new DeadlineTestTransport([self::token()]);
        $provider = new OAuthTokenProvider(self::ID, 'secret');
        $provider->getToken('https://example.test/' . self::ID . '/oauth/token', $transport, 1);
        self::assertGreaterThan(0, $transport->calls[0]['remaining']);
        self::assertLessThanOrEqual(1000, $transport->calls[0]['remaining']);
    }

    public function testLegacyCurlOverrideRemainsUsableOnlyForApiKeys(): void
    {
        $transport = new class extends CurlClient {
            public int $calls = 0;
            public function post($url, $data = null, array $header = [], int $timeout = 3, int $httpVersion = CURL_HTTP_VERSION_NONE): Response
            {
                $this->calls++;
                return new Response([], 200, null);
            }
        };
        $client = new Searcher('legacy-dataset', 'key', httpClient: $transport);
        $client->request('search', SearchRequestCollection::create());
        self::assertSame(1, $transport->calls);
        self::assertNotInstanceOf(DeadlineAwareClient::class, $transport);
        try
        {
            Searcher::createWithOAuth(self::ID, self::ID, 'secret', 'https://example.test', httpClient: $transport);
            self::fail('Legacy transports must not be silently opted into OAuth.');
        }
        catch (\InvalidArgumentException $exception)
        {
            self::assertStringContainsString('DeadlineAwareClient', $exception->getMessage());
            self::assertSame(1, $transport->calls);
        }
        $this->expectException(\InvalidArgumentException::class);
        (new OAuthTokenProvider(self::ID, 'secret'))->getToken('https://example.test/oauth/token', $transport);
    }

    #[DataProvider('nonRetryResponses')]
    public function testOtherFailuresDoNotRetry(Response|\Exception $failure): void
    {
        $transport = new DeadlineTestTransport([self::token(), $failure]);
        try
        {
            $result = $this->client($transport)->request('search', SearchRequestCollection::create());
            self::assertSame($failure, $result);
        }
        catch (ClientException $exception)
        {
            self::assertSame($failure, $exception);
        }
        self::assertCount(2, $transport->calls);
    }

    public static function nonRetryResponses(): iterable
    {
        foreach ([401, 403, 429, 500, 503] as $status)
        {
            yield [new Response(null, $status, null)];
        }
        yield [new ClientException('Network failure')];
        yield [new RequestTimeoutException('Timeout')];
    }

    public function testVoidTrackingRetryPreservesWritesAndEachChunkGetsItsOwnBudget(): void
    {
        $transport = new DeadlineTestTransport([self::token(), self::rejected(), self::token('replacement'),
            new Response(null, 204, null), new Response(null, 204, null)]);
        $tracker = Tracker::createWithOAuth(self::ID, self::ID, 'secret', 'https://example.test', 1, $transport);
        $tracker->setBatchSize(1);
        $request = new BatchedTrackingRequest();
        $request->items = [
            new class extends Trackable { public string $id = 'first'; },
            new class extends Trackable { public string $id = 'second'; },
        ];
        $tracker->batchedTracking($request);
        self::assertCount(5, $transport->calls);
        self::assertSame($transport->calls[1]['data'], $transport->calls[3]['data']);
        self::assertSame($transport->calls[1]['url'], $transport->calls[3]['url']);
        self::assertSame(array_slice($transport->calls[1]['header'], 1), array_slice($transport->calls[3]['header'], 1));
        self::assertSame($transport->calls[0]['deadline'], $transport->calls[3]['deadline']);
        self::assertNotSame($transport->calls[3]['deadline'], $transport->calls[4]['deadline']);
        self::assertStringContainsString('second', $transport->calls[4]['data']);
    }
}

class DeadlineTestTransport implements DeadlineAwareClient
{
    public array $calls = [];

    public function __construct(private array $responses, private int $delay = 0) {}

    public function postWithDeadline($url, $data, array $header, Deadline $deadline, int $httpVersion = CURL_HTTP_VERSION_NONE): Response
    {
        $remaining = $deadline->remainingMilliseconds();
        $this->calls[] = compact('url', 'data', 'header', 'deadline', 'remaining');
        usleep($this->delay);
        $response = array_shift($this->responses);
        if ($response instanceof \Exception) { throw $response; }
        return is_callable($response) ? $response() : $response;
    }

    public function post($url, $data = null, array $header = [], int $timeout = 3, int $httpVersion = CURL_HTTP_VERSION_NONE): Response
    {
        throw new \LogicException('OAuth must use the deadline-aware entry point.');
    }
}
