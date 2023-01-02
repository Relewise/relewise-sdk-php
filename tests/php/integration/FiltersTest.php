<?php

namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\UserFactory;
use Relewise\Models\DTO\Currency;
use Relewise\Models\DTO\FilterCollection;
use Relewise\Models\DTO\Language;
use Relewise\Models\DTO\ProductAssortmentFilter;
use Relewise\Models\DTO\ProductIdFilter;
use Relewise\Models\DTO\ProductSearchRequest;
use Relewise\Searcher;

class FiltersTest extends TestCase
{
    public function testProductAssortmentFilter(): void
    {
        $datasetId = getenv('DATASET_ID') ?: $_ENV['DATASET_ID'];
        $apiKey = getenv('API_KEY') ?: $_ENV['API_KEY'];

        $searcher = new Searcher($datasetId, $apiKey);

        $productSearchRequest = ProductSearchRequest::create()
            ->withFilters(
                FilterCollection::create()
                    ->withItems(
                        ProductAssortmentFilter::create()
                            ->withAssortments(10_000_000)
                    )
            )
            ->withTake(20)
            ->withLanguage(Language::create()->withValue("en-US"))
            ->withCurrency(Currency::create()->withValue("USD"))
            ->withDisplayedAtLocation("integration test")
            ->withUser(UserFactory::byTemporaryId("t-Id"));

        $response = $searcher->productSearch($productSearchRequest);

        self::assertNotNull($response);
        self::assertEmpty($response->results);
    }

    public function testProductIdFilter(): void
    {
        $datasetId = getenv('DATASET_ID') ?: $_ENV['DATASET_ID'];
        $apiKey = getenv('API_KEY') ?: $_ENV['API_KEY'];

        $searcher = new Searcher($datasetId, $apiKey);

        $productSearchRequest = ProductSearchRequest::create()
            ->withFilters(
                FilterCollection::create()
                    ->withItems(
                        ProductIdFilter::create()
                            ->withProductIds("1")
                    )
            )
            ->withTake(20)
            ->withLanguage(Language::create()->withValue("en-US"))
            ->withCurrency(Currency::create()->withValue("USD"))
            ->withDisplayedAtLocation("integration test")
            ->withUser(UserFactory::byTemporaryId("t-Id"));

        $response = $searcher->productSearch($productSearchRequest);

        self::assertNotNull($response);
        self::assertEquals(1, count($response->results));
    }
}
