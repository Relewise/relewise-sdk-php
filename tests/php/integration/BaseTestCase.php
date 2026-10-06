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
use Relewise\Models\AuthenticatedIdCondition;
use Relewise\Models\TrackUserAdministrativeActionRequest;
use Relewise\Models\UserAdministrativeAction;
use Relewise\Models\UserAdministrativeActionDeleteUser;
use Relewise\Models\UserConditionCollection;
use Relewise\Models\BrandAdministrativeAction;
use Relewise\Models\BrandAdministrativeActionUpdateKind;
use Relewise\Models\BrandIdFilter;
use Relewise\Models\CategoryAdministrativeActionUpdateKind;
use Relewise\Models\CategoryScope;
use Relewise\Models\ProductCategoryAdministrativeAction;
use Relewise\Models\ProductCategoryIdFilter;
use Relewise\Models\TrackBrandAdministrativeActionRequest;
use Relewise\Models\TrackProductCategoryAdministrativeActionRequest;

require_once dirname(__DIR__, 2) . '/support/IntegrationSearchSync.php';

class BaseTestCase extends TestCase
{
    /** @var string[] */
    private array $productsToDelete = [];
    /** @var string[] */
    private array $productCategoriesToDelete = [];
    /** @var string[] */
    private array $brandsToDelete = [];
    /** @var string[] */
    private array $usersToDelete = [];

    protected function tearDown(): void
    {
        try {
            try {
                if ($this->productsToDelete !== []) {
                    $this->deleteProducts($this->tracker(), array_values($this->productsToDelete));
                }
            } finally {
                try {
                    if ($this->productCategoriesToDelete !== []) {
                        $this->deleteProductCategories($this->tracker(), array_values($this->productCategoriesToDelete));
                    }
                } finally {
                    try {
                        if ($this->brandsToDelete !== []) {
                            $this->deleteBrands($this->tracker(), array_values($this->brandsToDelete));
                        }
                    } finally {
                        if ($this->usersToDelete !== []) {
                            $this->deleteUsers($this->tracker(), array_values($this->usersToDelete));
                        }
                    }
                }
            }
        } finally {
            parent::tearDown();
        }
    }

    protected function deleteFixtureProductAfterTest(string $productId): void
    {
        $this->productsToDelete[$productId] = $productId;
    }

    protected function deleteFixtureProductCategoryAfterTest(string $categoryId): void
    {
        $this->productCategoriesToDelete[$categoryId] = $categoryId;
    }

    protected function deleteFixtureBrandAfterTest(string $brandId): void
    {
        $this->brandsToDelete[$brandId] = $brandId;
    }

    protected function fixtureUserId(string $name): string
    {
        $userId = $this->fixtureId($name);
        $this->usersToDelete[$userId] = $userId;
        return $userId;
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

    /** @param string[] $userIds */
    protected function deleteUsers(Tracker $tracker, array $userIds): void
    {
        $tracking = $tracker->trackUserAdministrativeAction(
            TrackUserAdministrativeActionRequest::create(
                UserAdministrativeAction::create(
                    UserConditionCollection::create(AuthenticatedIdCondition::create($userIds)),
                    UserAdministrativeActionDeleteUser::create()
                )
            )
        );
        self::assertNull($tracking);
    }

    /** @param string[] $categoryIds */
    protected function deleteProductCategories(Tracker $tracker, array $categoryIds): void
    {
        $tracking = $tracker->trackProductCategoryAdministrativeAction(
            TrackProductCategoryAdministrativeActionRequest::create(
                ProductCategoryAdministrativeAction::create(
                    Language::UNDEFINED,
                    Currency::UNDEFINED,
                    CategoryAdministrativeActionUpdateKind::Delete
                )->setFilters(FilterCollection::create(
                    ProductCategoryIdFilter::create(CategoryScope::Ancestor)->setCategoryIdsFromArray($categoryIds)
                ))
            )
        );
        self::assertNull($tracking);
    }

    /** @param string[] $brandIds */
    protected function deleteBrands(Tracker $tracker, array $brandIds): void
    {
        $tracking = $tracker->trackBrandAdministrativeAction(
            TrackBrandAdministrativeActionRequest::create(
                BrandAdministrativeAction::create(
                    Language::UNDEFINED,
                    Currency::UNDEFINED,
                    FilterCollection::create(BrandIdFilter::create()->setBrandIdsFromArray($brandIds)),
                    BrandAdministrativeActionUpdateKind::Delete
                )
            )
        );
        self::assertNull($tracking);
    }

    /** Synchronize once after all fixture writes, then verify the exact product is searchable. */
    protected function awaitSearchableProduct(string $productId, string $language): void
    {
        (new IntegrationSearchSync())->synchronize($this->SERVER_URL(), $this->DATASET_ID(), $this->API_KEY());
        $request = \Relewise\Models\ProductSearchRequest::create(
            Language::create($language), Currency::create('USD'), \Relewise\Factory\UserFactory::anonymous(),
            'integration fixture readiness', null, 0, 1
        )->setFilters(FilterCollection::create(ProductIdFilter::create()->setProductIds($productId)));
        $searcher = $this->searcher();
        // Check the exact fixture ID so unrelated dataset contents cannot satisfy readiness.
        $deadline = hrtime(true) + 45_000_000_000;
        do {
            $response = $searcher->productSearch($request);
            if (array_map(fn($result) => $result->productId, $response->results) === [$productId]) {
                return;
            }
            usleep(500_000);
        } while (hrtime(true) < $deadline);
        self::fail('Integration product fixture was not searchable within 45 seconds');
    }

    protected function fixtureId(string $name): string
    {
        return sprintf('php-sdk-integration-%s-%s', $this->normalizeIdentifierPart($name, 64), bin2hex(random_bytes(4)));
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
