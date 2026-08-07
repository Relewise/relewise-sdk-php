<?php

namespace Relewise\Tests\Integration;

use PHPUnit\Framework\TestCase;
use Relewise\Analyzer;
use Relewise\Recommender;
use Relewise\RelewiseClient;
use Relewise\SearchAdministrator;
use Relewise\Searcher;
use Relewise\Tracker;
use Relewise\Models\Currency;
use Relewise\Models\FilterCollection;
use Relewise\Models\Language;
use Relewise\Models\ProductAdministrativeAction;
use Relewise\Models\ProductAdministrativeActionUpdateKind;
use Relewise\Models\ProductIdFilter;
use Relewise\Models\TrackProductAdministrativeActionRequest;
use Throwable;

class BaseTestCase extends TestCase
{
    private const EVENTUALLY_TIMEOUT_MILLISECONDS = 120_000;
    private const EVENTUALLY_INITIAL_DELAY_MILLISECONDS = 250;
    private const EVENTUALLY_MAX_DELAY_MILLISECONDS = 5_000;

    public function testGetDatasetIdAndApiKey(): void
    {
        self::assertNotNull($this->DATASET_ID());
        self::assertNotNull($this->API_KEY());
    }

    public function DATASET_ID() : string
    {
        return getenv('DATASET_ID') ?: $_ENV['DATASET_ID'];
    }

    public function API_KEY() : string
    {
        return getenv('API_KEY') ?: $_ENV['API_KEY'];
    }

    public function SERVER_URL(): string
    {
        $serverUrl = getenv('SERVER_URL') ?: 'https://api.relewise.com';

        return rtrim($serverUrl, '/');
    }

    protected function searcher(int $timeout = 5): Searcher
    {
        return $this->configureClient(new Searcher($this->DATASET_ID(), $this->API_KEY(), $timeout));
    }

    protected function tracker(int $timeout = 5): Tracker
    {
        return $this->configureClient(new Tracker($this->DATASET_ID(), $this->API_KEY(), $timeout));
    }

    protected function recommender(int $timeout = 5): Recommender
    {
        return $this->configureClient(new Recommender($this->DATASET_ID(), $this->API_KEY(), $timeout));
    }

    protected function analyzer(int $timeout = 5): Analyzer
    {
        return $this->configureClient(new Analyzer($this->DATASET_ID(), $this->API_KEY(), $timeout));
    }

    protected function searchAdministrator(int $timeout = 5): SearchAdministrator
    {
        return $this->configureClient(new SearchAdministrator($this->DATASET_ID(), $this->API_KEY(), $timeout));
    }

    protected function deleteProduct(Tracker $tracker, string $productId): void
    {
        $tracking = $tracker->trackProductAdministrativeAction(
            TrackProductAdministrativeActionRequest::create(
                ProductAdministrativeAction::create(
                    Language::UNDEFINED,
                    Currency::UNDEFINED,
                    FilterCollection::create(ProductIdFilter::create()->setProductIds($productId)),
                    ProductAdministrativeActionUpdateKind::Delete,
                    ProductAdministrativeActionUpdateKind::None
                )
            )
        );

        self::assertNull($tracking);
    }

    protected function uniqueEntityId(string $prefix): string
    {
        $normalizedPrefix = $this->normalizeIdentifierPart($prefix, 60);
        $runId = getenv('GITHUB_RUN_ID') ?: 'local';
        $normalizedRunId = $this->normalizeIdentifierPart($runId, 40);

        return sprintf('%s-%s-%s', $normalizedPrefix, $normalizedRunId, bin2hex(random_bytes(6)));
    }

    /**
     * @template TValue
     * @param callable(): TValue $probe
     * @param callable(TValue): bool $condition
     * @return TValue
     */
    protected function assertEventually(
        callable $probe,
        callable $condition,
        string $description,
        int $timeoutMilliseconds = self::EVENTUALLY_TIMEOUT_MILLISECONDS,
        int $initialDelayMilliseconds = self::EVENTUALLY_INITIAL_DELAY_MILLISECONDS,
        int $maxDelayMilliseconds = self::EVENTUALLY_MAX_DELAY_MILLISECONDS
    ): mixed {
        if ($timeoutMilliseconds < 0) {
            throw new \InvalidArgumentException('The eventual assertion timeout cannot be negative.');
        }

        if ($initialDelayMilliseconds < 1 || $maxDelayMilliseconds < $initialDelayMilliseconds) {
            throw new \InvalidArgumentException('The eventual assertion delays must be positive and ordered.');
        }

        $startedAt = microtime(true);
        $deadline = $startedAt + ($timeoutMilliseconds / 1_000);
        $delayMilliseconds = $initialDelayMilliseconds;
        $attempts = 0;
        $lastValue = null;
        $lastError = null;

        do {
            $attempts++;

            try {
                $lastValue = $probe();
                $lastError = null;

                if ($condition($lastValue)) {
                    return $lastValue;
                }
            } catch (Throwable $error) {
                $lastError = $error;
            }

            $remainingMilliseconds = (int) floor(($deadline - microtime(true)) * 1_000);
            if ($remainingMilliseconds <= 0) {
                break;
            }

            $sleepMilliseconds = min($delayMilliseconds, $remainingMilliseconds);
            usleep($sleepMilliseconds * 1_000);
            $delayMilliseconds = min($maxDelayMilliseconds, (int) ceil($delayMilliseconds * 1.5));
        } while (true);

        $elapsedMilliseconds = (int) round((microtime(true) - $startedAt) * 1_000);
        $lastObservation = $lastError === null
            ? $this->summarizeObservedValue($lastValue)
            : sprintf('%s: %s', $lastError::class, $lastError->getMessage());

        self::fail(sprintf(
            'Condition "%s" was not met after %d attempt(s) in %d ms. Last observation: %s',
            $description,
            $attempts,
            $elapsedMilliseconds,
            $lastObservation
        ));
    }

    private function normalizeIdentifierPart(string $value, int $maximumLength): string
    {
        $normalized = strtolower((string) preg_replace('/[^a-zA-Z0-9]+/', '-', $value));
        $normalized = trim($normalized, '-');

        return substr($normalized === '' ? 'test' : $normalized, 0, $maximumLength);
    }

    private function summarizeObservedValue(mixed $value): string
    {
        $encoded = json_encode($value, JSON_PARTIAL_OUTPUT_ON_ERROR | JSON_UNESCAPED_SLASHES);
        $summary = $encoded === false ? get_debug_type($value) : $encoded;

        return strlen($summary) > 1_000 ? substr($summary, 0, 997) . '...' : $summary;
    }

    /**
     * @template TClient of RelewiseClient
     * @param TClient $client
     * @return TClient
     */
    private function configureClient(RelewiseClient $client): RelewiseClient
    {
        $client->serverUrl = $this->SERVER_URL();

        return $client;
    }
}
