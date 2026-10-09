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

class BaseTestCase extends TestCase
{
    /** @var string[] */
    private array $productsToDelete = [];

    protected function tearDown(): void
    {
        try {
            if ($this->productsToDelete !== []) {
                $this->deleteProducts($this->tracker(), array_values($this->productsToDelete));
            }
        } finally {
            parent::tearDown();
        }
    }

    protected function deleteFixtureProductAfterTest(string $productId): void
    {
        $this->productsToDelete[$productId] = $productId;
    }

    protected function fixtureUserId(string $name): string
    {
        return $this->fixtureId($name);
    }

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

    public function TEST_LANGUAGE(): string
    {
        return getenv('TEST_LANGUAGE') ?: 'en-US';
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
        $this->deleteProducts($tracker, [$productId]);
    }

    /** @param string[] $productIds */
    protected function deleteProducts(Tracker $tracker, array $productIds): void
    {
        $tracking = $tracker->trackProductAdministrativeAction(
            TrackProductAdministrativeActionRequest::create(
                ProductAdministrativeAction::create(
                    Language::UNDEFINED,
                    Currency::UNDEFINED,
                    FilterCollection::create(ProductIdFilter::create()->setProductIdsFromArray($productIds)),
                    ProductAdministrativeActionUpdateKind::Delete,
                    ProductAdministrativeActionUpdateKind::None
                )
            )
        );

        self::assertNull($tracking);
    }

    protected function fixtureId(string $name): string
    {
        return 'php-sdk-' . $this->normalizeIdentifierPart($name, 64);
    }

    private function normalizeIdentifierPart(string $value, int $maximumLength): string
    {
        $normalized = strtolower((string) preg_replace('/[^a-zA-Z0-9]+/', '-', $value));
        $normalized = trim($normalized, '-');

        return substr($normalized === '' ? 'test' : $normalized, 0, $maximumLength);
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
