<?php declare(strict_types=1);

require __DIR__ . '/../../../vendor/autoload.php';
require __DIR__ . '/../../Bootstrap_phpunit.php';
require __DIR__ . '/RedisOAuthCache.php';

use Relewise\Tests\Redis\{RedisConnection, RedisOAuthCache};
use Relewise\{OAuthTokenCache, OAuthTokenProvider, Searcher};
use Relewise\Infrastructure\HttpClient\{Deadline, DeadlineAwareClient, DeadlineCurlClient, Response};
use Relewise\Factory\UserFactory;
use Relewise\Models\{Currency, Language, ProductSearchRequest};

// Only non-secret fixture options travel on the command line.
$options = json_decode($argv[1], true, flags: JSON_THROW_ON_ERROR);
$redis = new RedisConnection((int) getenv('OAUTH_REDIS_PORT'));
$cache = new RedisOAuthCache($redis, $options['prefix']);
$live = $options['live'] ?? false;
$transport = new class($redis, $options) implements DeadlineAwareClient {
    public function __construct(private RedisConnection $redis, private array $options) {}
    public function postWithDeadline($url, $data, array $header, Deadline $deadline, int $httpVersion = CURL_HTTP_VERSION_NONE): Response
    {
        if (str_ends_with($url, '/oauth/token'))
        {
            $number = $this->redis->command($deadline, 'INCR', $this->options['prefix'] . ':acquisitions');
            if (!($this->options['live'] ?? false))
            {
                usleep(150000);
                $deadline->throwIfExpired();
                return new Response([
                    'access_token' => 'fixture-token-' . $number,
                    'expires_in' => $this->options['lifetime'] ?? 300,
                    'token_type' => 'Bearer',
                ], ($this->options['fail'] ?? false) ? 503 : 200, null);
            }
        }
        return (new DeadlineCurlClient())->postWithDeadline($url, $data, $header, $deadline, $httpVersion);
    }
    public function post($url, $data = null, array $header = [], int $timeout = 3, int $httpVersion = CURL_HTTP_VERSION_NONE): Response
    { throw new LogicException('Expected deadline-aware transport.'); }
};

fgets(STDIN); // Barrier: the parent releases all competing processes together.
try
{
    $provider = new class(
        $live ? getenv('OAUTH_CLIENT_ID') : '11111111-2222-3333-4444-555555555555',
        $live ? getenv('OAUTH_CLIENT_SECRET') : ($options['secret'] ?? 'fixture-secret'),
        $cache, $live ? 0.0 : (float) ($options['clockOffset'] ?? 0)
    ) extends OAuthTokenProvider {
        public function __construct(string $id, string $secret, OAuthTokenCache $cache, private float $offset)
        { parent::__construct($id, $secret, $cache); }
        protected function now(): float { return parent::now() + $this->offset; }
    };
    $endpoint = $live
        ? rtrim(getenv('SERVER_URL'), '/') . '/' . getenv('DATASET_ID') . '/oauth/token'
        : 'https://example.test/' . ($options['dataset'] ?? 'dataset') . '/oauth/token';
    $token = $provider->getToken($endpoint, $transport, 15, CURL_HTTP_VERSION_NONE, $options['rejected'] ?? null);
    if ($live)
    {
        $searcher = new Searcher(getenv('DATASET_ID'), '', 15, $provider, $transport);
        $searcher->serverUrl = rtrim(getenv('SERVER_URL'), '/');
        $searcher->productSearch(ProductSearchRequest::create(
            Language::create(getenv('TEST_LANGUAGE') ?: 'en-US'), Currency::create('USD'),
            UserFactory::anonymous(), 'PHP SDK Redis integration test', null, 0, 1
        ));
    }
    echo json_encode(['ok' => true, 'hash' => hash('sha256', $token->accessToken), 'expiry' => $token->expiresAt->format('U.u')]), PHP_EOL;
}
catch (Throwable $exception)
{
    // Do not print exception messages, traces, credentials or token contents.
    echo json_encode(['ok' => false, 'error' => get_class($exception), 'code' => $exception->getCode()]), PHP_EOL;
}
