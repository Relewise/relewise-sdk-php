<?php

namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\UserFactory;
use Relewise\Models\Currency;
use Relewise\Models\FilterCollection;
use Relewise\Models\Language;
use Relewise\Models\ProductAssortmentFilter;
use Relewise\Models\ProductIdFilter;
use Relewise\Models\ProductSearchRequest;
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
        )->setFilters(
            FilterCollection::create()
                ->setItems(
                    ProductAssortmentFilter::create()
                        ->setAssortments(10_000_000)
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
        )->setFilters(
            FilterCollection::create()
                ->setItems(
                    ProductIdFilter::create()
                        ->setProductIds("1")
                )
        );

        $response = $searcher->productSearch($productSearchRequest);

        self::assertNotNull($response);
        self::assertEquals(1, count($response->results));
    }
}
