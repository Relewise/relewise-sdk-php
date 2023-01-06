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

class FiltersTest extends BaseTest
{
    public function testProductAssortmentFilter(): void
    {
        $searcher = new Searcher($this->DATASET_ID(), $this->API_KEY());

        $productSearchRequest = ProductSearchRequest::create(
            Language::create("en-US"),
            Currency::create("USD"),
            UserFactory::byTemporaryId("t-Id"),
            "integration test",
            "1",
            0,
            20
        )->withFilters(
            FilterCollection::create()
                ->withItems(
                    ProductAssortmentFilter::create()
                        ->withAssortments(10_000_000)
                )
        );

        $response = $searcher->productSearch($productSearchRequest);

        self::assertNotNull($response);
        self::assertEmpty($response->results);
    }

    public function testProductIdFilter(): void
    {
        $searcher = new Searcher($this->DATASET_ID(), $this->API_KEY());

        $productSearchRequest = ProductSearchRequest::create(
            Language::create("en-US"),
            Currency::create("USD"),
            UserFactory::byTemporaryId("t-Id"),
            "integration test",
            "1",
            0,
            20
        )->withFilters(
            FilterCollection::create()
                ->withItems(
                    ProductIdFilter::create()
                        ->withProductIds("1")
                )
        );

        $response = $searcher->productSearch($productSearchRequest);

        self::assertNotNull($response);
        self::assertEquals(1, count($response->results));
    }
}
