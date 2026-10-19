<?php declare(strict_types=1);

namespace Relewise\Tests\Unit;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Relewise\{Analyzer, OAuthTokenProvider, Recommender, RelewiseClient, SearchAdministrator, Searcher, Tracker};
use Relewise\Infrastructure\HttpClient\{Client, ClientException, OAuthChallenge, Response, UnauthorizedException};
use Relewise\Models\SearchRequestCollection;

class OAuthTest extends TestCase
{
    private const ID = '11111111-2222-3333-4444-555555555555';
    private const ENDPOINT = 'https://example.test/dataset/oauth/token';

    private function provider(): OAuthTestProvider
    {
        return new OAuthTestProvider(self::ID, 'secret +:/');
    }

    private static function token(string $value = 'token-1', int $lifetime = 100): Response
    {
        return new Response(['access_token' => $value, 'expires_in' => $lifetime, 'token_type' => 'Bearer'], 200, 'application/json');
    }

    private function transport(RelewiseClient $client, array $responses): OAuthTestTransport
    {
        $transport = new OAuthTestTransport($responses);
        (new \ReflectionProperty(RelewiseClient::class, 'client'))->setValue($client, $transport);
        return $transport;
    }

    public function testTokenRequestEncodingCacheAndEarlyRenewal(): void
    {
        $provider = $this->provider();
        $transport = new OAuthTestTransport([self::token(), self::token('token-2')]);
        $first = $provider->getToken(self::ENDPOINT, $transport, 7, CURL_HTTP_VERSION_1_1);
        self::assertSame(1100.0, (float) $first->expiresAt->format('U.u'));
        self::assertSame('token-1', $first->accessToken);
        self::assertSame('grant_type=client_credentials', $transport->calls[0]['data']);
        self::assertContains('Authorization: Basic ' . base64_encode(self::ID . ':secret%20%2B%3A%2F'), $transport->calls[0]['header']);
        self::assertContains('Content-Type: application/x-www-form-urlencoded', $transport->calls[0]['header']);
        self::assertSame(7, $transport->calls[0]['timeout']);
        self::assertSame(CURL_HTTP_VERSION_1_1, $transport->calls[0]['httpVersion']);
        $provider->time = 1089;
        self::assertSame($first, $provider->getToken(self::ENDPOINT, $transport));
        $provider->time = 1090;
        self::assertSame('token-2', $provider->getToken(self::ENDPOINT, $transport)->accessToken);
        self::assertCount(2, $transport->calls);
    }

    public function testShortLifetimesAndRejectedTokenReuse(): void
    {
        $provider = $this->provider();
        $transport = new OAuthTestTransport([self::token('short', 5), self::token('replacement')]);
        $first = $provider->getToken(self::ENDPOINT, $transport);
        $provider->time = 1004;
        self::assertSame($first, $provider->getToken(self::ENDPOINT, $transport));
        $provider->time = 1004.5;
        $replacement = $provider->getToken(self::ENDPOINT, $transport);
        self::assertSame('replacement', $replacement->accessToken);
        self::assertSame($replacement, $provider->getToken(self::ENDPOINT, $transport, rejectedToken: 'short'));
        self::assertCount(2, $transport->calls);
    }

    public function testCacheIsBoundToTokenEndpoint(): void
    {
        $provider = $this->provider();
        $transport = new OAuthTestTransport([self::token(), self::token('other')]);
        $provider->getToken(self::ENDPOINT, $transport);
        self::assertSame('other', $provider->getToken('https://other.test/dataset/oauth/token', $transport)->accessToken);
        self::assertCount(2, $transport->calls);
    }

    #[DataProvider('invalidTokenResponses')]
    public function testInvalidTokenResponsesAreRejectedWithoutExposingBody(mixed $body, int $status): void
    {
        $provider = $this->provider();
        try
        {
            $provider->getToken(self::ENDPOINT, new OAuthTestTransport([new Response($body, $status, 'application/json')]));
            self::fail('Expected token rejection');
        }
        catch (ClientException $exception)
        {
            self::assertStringNotContainsString('sensitive', $exception->getMessage());
            self::assertStringContainsString('OAuth', $exception->getMessage());
        }
    }

    public static function invalidTokenResponses(): iterable
    {
        yield [['error_description' => 'sensitive'], 401];
        yield ['sensitive', 200];
        yield [null, 200];
        foreach ([[], ['access_token' => 'sensitive'],
            ['access_token' => '', 'expires_in' => 30, 'token_type' => 'Bearer'],
            ['access_token' => "sensitive\r\n", 'expires_in' => 30, 'token_type' => 'Bearer'],
            ['access_token' => 'sensitive', 'expires_in' => 0, 'token_type' => 'Bearer'],
            ['access_token' => 'sensitive', 'expires_in' => '30', 'token_type' => 'Bearer'],
            ['access_token' => 'sensitive', 'expires_in' => 30, 'token_type' => 'Basic']] as $body)
        {
            yield [$body, 200];
        }
    }

    public function testFailedRefreshDiscardsTheOldToken(): void
    {
        $provider = $this->provider();
        $transport = new OAuthTestTransport([self::token(), new Response([], 500, null), self::token('replacement')]);
        $provider->getToken(self::ENDPOINT, $transport);
        try
        {
            $provider->getToken(self::ENDPOINT, $transport, rejectedToken: 'token-1');
            self::fail('Expected token failure');
        }
        catch (ClientException $exception)
        {
            self::assertSame(500, $exception->getCode());
        }
        self::assertSame('replacement', $provider->getToken(self::ENDPOINT, $transport)->accessToken);
        self::assertCount(3, $transport->calls);
    }

    public static function clients(): iterable
    {
        foreach ([Searcher::class, Recommender::class, Tracker::class, SearchAdministrator::class, Analyzer::class] as $class)
        {
            yield [$class];
        }
    }

    #[DataProvider('clients')]
    public function testFactoriesAndExistingNamedApiKeyCalls(string $class): void
    {
        $client = $class::createWithOAuth(datasetId: 'dataset', clientId: self::ID, clientSecret: 'secret', serverUrl: 'https://example.test/', timeout: 9);
        self::assertInstanceOf($class, $client);
        $transport = $this->transport($client, [self::token(), new Response([], 200, null)]);
        $client->request('SearchRequestCollection', SearchRequestCollection::create());
        self::assertSame(self::ENDPOINT, $transport->calls[0]['url']);
        self::assertSame('https://example.test/dataset/v1/SearchRequestCollection', $transport->calls[1]['url']);
        self::assertContains('Authorization: Bearer token-1', $transport->calls[1]['header']);
        self::assertSame(9, $transport->calls[1]['timeout']);

        $legacy = new $class(datasetId: 'dataset', apiKey: 'legacy-key', timeout: 7);
        $legacyTransport = $this->transport($legacy, [new Response([], 200, null)]);
        $legacy->request('SearchRequestCollection', SearchRequestCollection::create());
        self::assertCount(1, $legacyTransport->calls);
        self::assertContains('Authorization: ApiKey legacy-key', $legacyTransport->calls[0]['header']);
        self::assertSame(7, $legacyTransport->calls[0]['timeout']);
    }

    #[DataProvider('clients')]
    public function testOAuthFactoryRetainsEachClientsDefaultTimeout(string $class): void
    {
        $default = (new \ReflectionMethod($class, '__construct'))->getParameters()[2]->getDefaultValue();
        $client = $class::createWithOAuth('dataset', self::ID, 'secret', 'https://example.test');
        $transport = $this->transport($client, [self::token(), new Response(null, 401, null)]);
        try
        {
            $client->requestAndValidate('SearchRequestCollection', SearchRequestCollection::create());
            self::fail('Expected unauthorized response');
        }
        catch (UnauthorizedException $exception)
        {
            self::assertStringContainsString('OAuth credentials', $exception->getMessage());
            self::assertStringNotContainsString('API key', $exception->getMessage());
        }
        self::assertSame($default, $transport->calls[0]['timeout']);
        self::assertSame($default, $transport->calls[1]['timeout']);
    }

    public function testInvalidTokenRetriesOnceWithIdenticalPayload(): void
    {
        $client = Searcher::createWithOAuth('dataset', self::ID, 'secret', 'https://example.test');
        $rejected = new Response([], 401, null, ['WWW-Authenticate' => ['Bearer error="invalid_token"']]);
        $transport = $this->transport($client, [self::token(), $rejected, self::token('renewed'), $rejected]);
        try
        {
            $client->requestAndValidate('SearchRequestCollection', SearchRequestCollection::create());
            self::fail('Expected final 401');
        }
        catch (UnauthorizedException $exception)
        {
            self::assertSame(401, $exception->getCode());
        }
        self::assertCount(4, $transport->calls);
        self::assertSame($transport->calls[1]['url'], $transport->calls[3]['url']);
        self::assertSame($transport->calls[1]['data'], $transport->calls[3]['data']);
        self::assertContains('Authorization: Bearer renewed', $transport->calls[3]['header']);
    }

    public function testOrdinaryUnauthorizedDoesNotRenewAndCacheIsSharedAcrossClients(): void
    {
        $provider = $this->provider();
        $first = new Searcher('dataset', '', oauthTokenProvider: $provider);
        $second = new Tracker('dataset', '', oauthTokenProvider: $provider);
        $transport = $this->transport($first, [self::token(), new Response([], 401, null)]);
        $first->request('SearchRequestCollection', SearchRequestCollection::create());
        self::assertCount(2, $transport->calls);
        $other = $this->transport($second, [new Response([], 200, null)]);
        $second->request('SearchRequestCollection', SearchRequestCollection::create());
        self::assertCount(1, $other->calls);
        self::assertContains('Authorization: Bearer token-1', $other->calls[0]['header']);
    }

    public function testSuccessfulRetryAndNextRequestReuseReplacement(): void
    {
        $client = Searcher::createWithOAuth('dataset', self::ID, 'secret', 'https://example.test');
        $rejected = new Response(null, 401, null, ['WWW-Authenticate' => ['Bearer error="invalid_token"']]);
        $transport = $this->transport($client, [self::token(), $rejected, self::token('renewed'),
            new Response(['success' => true], 200, null), new Response([], 200, null)]);
        self::assertSame(['success' => true], $client->requestAndValidate('SearchRequestCollection', SearchRequestCollection::create()));
        $client->request('SearchRequestCollection', SearchRequestCollection::create());
        self::assertCount(5, $transport->calls);
        self::assertContains('Authorization: Bearer renewed', $transport->calls[4]['header']);
    }

    public function testApiKeyClientNeverUsesOAuthRetry(): void
    {
        $client = new Searcher('dataset', 'key');
        $response = new Response(null, 401, null, ['WWW-Authenticate' => ['Bearer error="invalid_token"']]);
        $transport = $this->transport($client, [$response]);
        self::assertSame($response, $client->request('SearchRequestCollection', SearchRequestCollection::create()));
        self::assertCount(1, $transport->calls);
    }

    public function testTokenFailureDoesNotSendApiRequest(): void
    {
        $client = Searcher::createWithOAuth('dataset', self::ID, 'secret', 'https://example.test');
        $transport = $this->transport($client, [new Response(['error' => 'invalid_client'], 401, null)]);
        try
        {
            $client->request('SearchRequestCollection', SearchRequestCollection::create());
            self::fail('Expected token acquisition failure');
        }
        catch (ClientException $exception)
        {
            self::assertSame(401, $exception->getCode());
            self::assertCount(1, $transport->calls);
        }
    }

    #[DataProvider('invalidConstruction')]
    public function testInvalidConstruction(callable $construct): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $construct();
    }

    public static function invalidConstruction(): iterable
    {
        yield [fn() => new Searcher('dataset', '')];
        yield [fn() => new Searcher('dataset', 'key', oauthTokenProvider: new OAuthTokenProvider(self::ID, 'secret'))];
        yield [fn() => Searcher::createWithOAuth('dataset', self::ID, 'secret', 'http://example.test')];
        yield [fn() => Searcher::createWithOAuth('dataset', self::ID, 'secret', 'https://user:pass@example.test')];
        yield [fn() => Searcher::createWithOAuth('dataset', self::ID, 'secret', 'https://example.test?query=1')];
        yield [fn() => Searcher::createWithOAuth('dataset', self::ID, 'secret', 'https://example.test#fragment')];
        yield [fn() => Searcher::createWithOAuth('', self::ID, 'secret', 'https://example.test')];
        yield [fn() => Searcher::createWithOAuth('dataset', self::ID, 'secret', 'https://example.test', 0)];
    }

    #[DataProvider('challenges')]
    public function testChallenges(string $header, bool $expected): void
    {
        self::assertSame($expected, OAuthChallenge::isInvalidToken(new Response(null, 401, null, ['wWw-AuThEnTiCaTe' => [$header]])));
        self::assertFalse(OAuthChallenge::isInvalidToken(new Response(null, 403, null, ['WWW-Authenticate' => [$header]])));
    }

    public static function challenges(): iterable
    {
        yield ['Bearer error="invalid_token"', true];
        yield ['bearer ERROR=invalid_token', true];
        yield ['Basic realm="example", Bearer realm="a,b", error="invalid_token"', true];
        yield ['Bearer error="invalid_token", error_description="expired, renew"', true];
        yield ['Bearer realm="a\\"b,c", error="invalid_token"', true];
        yield ['Basic error="invalid_token"', false];
        yield ['Bearer error="insufficient_scope"', false];
        yield ['Bearer error="INVALID_TOKEN"', false];
        yield ['Bearer realm="error=invalid_token"', false];
        yield ['Bearer error="invalid_token", error="invalid_token"', false];
        yield ['Bearer error="invalid_token', false];
        yield ['Bearer realm="a, Bearer error=invalid_token"', false];
        yield ['Bearer', false];
    }

    #[DataProvider('invalidCredentials')]
    public function testInvalidCredentials(string $id, string $secret): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new OAuthTokenProvider($id, $secret);
    }

    public static function invalidCredentials(): iterable
    {
        yield ['', 'secret'];
        yield ['not-a-uuid', 'secret'];
        yield ['00000000-0000-0000-0000-000000000000', 'secret'];
        yield [self::ID, ' '];
    }

    public function testMutableServerUrlCannotSendCredentialsOverHttp(): void
    {
        $client = Searcher::createWithOAuth('dataset', self::ID, 'secret', 'https://example.test');
        $transport = $this->transport($client, []);
        $client->serverUrl = 'http://example.test';
        try
        {
            $client->request('SearchRequestCollection', SearchRequestCollection::create());
            self::fail('Expected insecure endpoint rejection');
        }
        catch (\InvalidArgumentException $exception)
        {
            self::assertCount(0, $transport->calls);
        }
    }
}

class OAuthTestProvider extends OAuthTokenProvider
{
    public float $time = 1000;
    protected function now(): float { return $this->time; }
}

class OAuthTestTransport implements Client
{
    public array $calls = [];
    public function __construct(private array $responses) {}
    public function post($url, $data = null, array $header = [], int $timeout = 3, int $httpVersion = CURL_HTTP_VERSION_NONE): Response
    {
        $this->calls[] = compact('url', 'data', 'header', 'timeout', 'httpVersion');
        if ($this->responses === []) { throw new \RuntimeException('Unexpected HTTP call'); }
        return array_shift($this->responses);
    }
}
