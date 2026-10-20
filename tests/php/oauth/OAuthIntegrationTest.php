<?php declare(strict_types=1);

namespace Relewise\Tests\OAuth;

use PHPUnit\Framework\TestCase;
use Relewise\Factory\UserFactory;
use Relewise\Infrastructure\HttpClient\{ClientException, Deadline, DeadlineAwareClient, DeadlineCurlClient, OAuthChallenge, Response};
use Relewise\Models\Currency;
use Relewise\Models\FilterCollection;
use Relewise\Models\Language;
use Relewise\Models\Product;
use Relewise\Models\ProductAdministrativeAction;
use Relewise\Models\ProductAdministrativeActionUpdateKind;
use Relewise\Models\ProductIdFilter;
use Relewise\Models\ProductSearchRequest;
use Relewise\Models\ProductSearchResponse;
use Relewise\Models\ProductUpdate;
use Relewise\Models\ProductView;
use Relewise\Models\TrackProductAdministrativeActionRequest;
use Relewise\Models\TrackProductUpdateRequest;
use Relewise\Models\TrackProductViewRequest;
use Relewise\{OAuthTokenProvider, Searcher, Tracker};

/** Opt-in tests against a non-production dataset. Never reloads engines or rotates credentials. */
class OAuthIntegrationTest extends TestCase
{
    private string $datasetId;
    private string $serverUrl;
    private string $clientId;
    private string $clientSecret;

    protected function setUp(): void
    {
        if (getenv('RUN_OAUTH_INTEGRATION') !== '1')
        {
            self::markTestSkipped('Set RUN_OAUTH_INTEGRATION=1 to enable live OAuth tests.');
        }
        foreach (['DATASET_ID', 'SERVER_URL', 'OAUTH_CLIENT_ID', 'OAUTH_CLIENT_SECRET'] as $name)
        {
            if (!is_string(getenv($name)) || trim(getenv($name)) === '')
            {
                self::fail('Missing required OAuth test setting: ' . $name);
            }
        }
        $this->datasetId = getenv('DATASET_ID');
        $this->serverUrl = rtrim(getenv('SERVER_URL'), '/');
        $this->clientId = getenv('OAUTH_CLIENT_ID');
        $this->clientSecret = getenv('OAUTH_CLIENT_SECRET');
    }

    public function testStandaloneProviderReusesTokenAndOriginalExpiry(): void
    {
        $transport = new ObservedOAuthTransport();
        $provider = new OAuthTokenProvider($this->clientId, $this->clientSecret);
        $endpoint = $this->serverUrl . '/' . $this->datasetId . '/oauth/token';
        $before = microtime(true);
        $first = $provider->getToken($endpoint, $transport, 15);
        $second = $provider->getToken($endpoint, $transport, 15);
        // Compare booleans so assertion failures cannot print a token.
        self::assertTrue($first->accessToken !== '');
        self::assertTrue($first->accessToken === $second->accessToken);
        self::assertTrue($first->expiresAt == $second->expiresAt);
        self::assertGreaterThan($before, (float) $first->expiresAt->format('U.u'));
        self::assertCount(1, $transport->tokenCalls);
        self::assertSame([], $transport->apiCalls);
    }

    public function testDefaultTransportSearch(): void
    {
        $searcher = Searcher::createWithOAuth(
            $this->datasetId, $this->clientId, $this->clientSecret, $this->serverUrl, 15
        );
        self::assertInstanceOf(ProductSearchResponse::class, $searcher->productSearch($this->searchRequest()));
    }

    public function testSelectedTransportReusesTokenAcrossSearches(): void
    {
        $transport = new ObservedOAuthTransport();
        $searcher = Searcher::createWithOAuth(
            $this->datasetId, $this->clientId, $this->clientSecret, $this->serverUrl, 15, $transport
        );
        self::assertInstanceOf(ProductSearchResponse::class, $searcher->productSearch($this->searchRequest()));
        self::assertInstanceOf(ProductSearchResponse::class, $searcher->productSearch($this->searchRequest()));
        self::assertCount(1, $transport->tokenCalls);
        self::assertCount(2, $transport->apiCalls);
        self::assertSame([200, 200], array_column($transport->apiCalls, 'status'));
    }

    public function testInvalidTokenRecoveryPreservesTrackingWriteAndSharesReplacement(): void
    {
        $transport = new ObservedOAuthTransport();
        $transport->rejectNextApiToken = true;
        $provider = new OAuthTokenProvider($this->clientId, $this->clientSecret);
        $tracker = new Tracker($this->datasetId, '', 15, $provider, $transport);
        $tracker->serverUrl = $this->serverUrl;
        $searcher = new Searcher($this->datasetId, '', 15, $provider, $transport);
        $searcher->serverUrl = $this->serverUrl;
        $productId = 'php-sdk-oauth-' . bin2hex(random_bytes(8));
        try
        {
            self::assertNull($tracker->trackProductUpdate(TrackProductUpdateRequest::create(
                ProductUpdate::create(Product::create($productId), [])
            )));
            self::assertNull($tracker->trackProductView(TrackProductViewRequest::create(
                ProductView::create(UserFactory::byTemporaryId($productId), Product::create($productId))
            )));
            self::assertInstanceOf(ProductSearchResponse::class, $searcher->productSearch($this->searchRequest($productId)));
            self::assertCount(2, $transport->tokenCalls);
            self::assertCount(4, $transport->apiCalls);
            self::assertSame([401, 200, 200, 200], array_column($transport->apiCalls, 'status'));
            self::assertTrue($transport->apiCalls[0]['invalidToken']);
            self::assertSame($transport->apiCalls[0]['payloadHash'], $transport->apiCalls[1]['payloadHash']);
        }
        finally
        {
            // Cleanup is restricted to the random product owned by this test.
            $tracker->trackProductAdministrativeAction(TrackProductAdministrativeActionRequest::create(
                ProductAdministrativeAction::create(
                    Language::UNDEFINED,
                    Currency::UNDEFINED,
                    FilterCollection::create(ProductIdFilter::create()->setProductIds($productId)),
                    ProductAdministrativeActionUpdateKind::Delete,
                    ProductAdministrativeActionUpdateKind::None
                )
            ));
        }
    }

    public function testInvalidSecretPreventsApiTraffic(): void
    {
        $transport = new ObservedOAuthTransport();
        $searcher = Searcher::createWithOAuth(
            $this->datasetId, $this->clientId, 'invalid-test-secret-' . bin2hex(random_bytes(8)),
            $this->serverUrl, 15, $transport
        );
        try
        {
            $searcher->productSearch($this->searchRequest());
            self::fail('An invalid client secret must fail acquisition.');
        }
        catch (ClientException $exception)
        {
            self::assertSame(401, $exception->getCode());
            self::assertCount(1, $transport->tokenCalls);
            self::assertSame([], $transport->apiCalls);
        }
    }

    private function searchRequest(?string $productId = null): ProductSearchRequest
    {
        $request = ProductSearchRequest::create(
            Language::create(getenv('TEST_LANGUAGE') ?: 'en-US'),
            Currency::create('USD'),
            UserFactory::anonymous(),
            'PHP SDK OAuth integration test',
            null,
            0,
            1
        );
        if ($productId !== null)
        {
            $request->setFilters(FilterCollection::create(ProductIdFilter::create()->setProductIds($productId)));
        }
        return $request;
    }
}

/** Records only status, duration, and payload hashes; never credentials, headers or response bodies. */
class ObservedOAuthTransport implements DeadlineAwareClient
{
    public array $tokenCalls = [];
    public array $apiCalls = [];
    public bool $rejectNextApiToken = false;
    private DeadlineCurlClient $client;

    public function __construct()
    {
        $this->client = new DeadlineCurlClient();
    }

    public function postWithDeadline($url, $data, array $header, Deadline $deadline, int $httpVersion = CURL_HTTP_VERSION_NONE): Response
    {
        $isTokenRequest = str_ends_with($url, '/oauth/token');
        if (!$isTokenRequest && $this->rejectNextApiToken)
        {
            $this->rejectNextApiToken = false;
            foreach ($header as &$value)
            {
                if (stripos($value, 'Authorization:') === 0)
                {
                    $value = 'Authorization: Bearer invalid-php-sdk-test-token';
                }
            }
            unset($value);
        }
        $start = hrtime(true);
        $response = $this->client->postWithDeadline($url, $data, $header, $deadline, $httpVersion);
        $call = ['status' => $response->code, 'milliseconds' => (hrtime(true) - $start) / 1e6];
        if ($isTokenRequest)
        {
            $this->tokenCalls[] = $call;
        }
        else
        {
            $call['payloadHash'] = hash('sha256', $data);
            $call['invalidToken'] = OAuthChallenge::isInvalidToken($response);
            $this->apiCalls[] = $call;
        }
        return $response;
    }

    public function post($url, $data = null, array $header = [], int $timeout = 3, int $httpVersion = CURL_HTTP_VERSION_NONE): Response
    {
        throw new \LogicException('OAuth must use the deadline-aware transport entry point.');
    }
}
