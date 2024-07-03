<?php

namespace Relewise\Tests\Integration;

use DateTime;
use \PHPUnit\Framework\TestCase;
use Relewise\Factory\UserFactory;
use Relewise\Models\Currency;
use Relewise\Models\FilterCollection;
use Relewise\Models\Language;
use Relewise\Models\Product;
use Relewise\Models\ProductAssortmentFilter;
use Relewise\Models\ProductIdFilter;
use Relewise\Models\ProductRecentlyViewedByUserFilter;
use Relewise\Models\ProductSearchRequest;
use Relewise\Models\ProductView;
use Relewise\Models\TrackProductViewRequest;
use Relewise\Searcher;
use Relewise\Tracker;

class FiltersTest extends BaseTestCase
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

    public function testProductRecentlyViewedByUserFilter(): void
    {
        $tracker = new Tracker($this->DATASET_ID(), $this->API_KEY());
        $searcher = new Searcher($this->DATASET_ID(), $this->API_KEY());

        $user = UserFactory::byTemporaryId("t-" . rand());

        $viewTracking = TrackProductViewRequest::create(
            ProductView::create($user, Product::create("p12813"))
        );

        $tracker->trackProductView($viewTracking);

        $since = new DateTime("now");
        $since->modify("-1 hour");

        $productSearchRequest = ProductSearchRequest::create(
            Language::create("en-US"),
            Currency::create("USD"),
            $user,
            "integration test",
            null,
            0,
            20
        )->setFilters(
            FilterCollection::create(ProductRecentlyViewedByUserFilter::create($since))
        );

        fwrite(STDOUT, json_encode($productSearchRequest));

        $response = $searcher->productSearch($productSearchRequest);

        self::assertNotNull($response);
        self::assertEquals(1, count($response->results));
    }
}
