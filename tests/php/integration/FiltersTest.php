<?php

namespace Relewise\Tests\Integration;

use DateTime;
use Relewise\Factory\UserFactory;
use Relewise\Models\Currency;
use Relewise\Models\FilterCollection;
use Relewise\Models\Language;
use Relewise\Models\ProductAssortmentFilter;
use Relewise\Models\ProductIdFilter;
use Relewise\Models\ProductRecentlyViewedByUserFilter;
use Relewise\Models\ProductSearchRequest;

class FiltersTest extends BaseTestCase
{
    public function testProductAssortmentFilter(): void
    {
        $searcher = $this->searcher();

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
    }

    public function testProductIdFilter(): void
    {
        $searcher = $this->searcher();
        $productId = $this->fixtureId('filters-product-id-product');

        $productSearchRequest = ProductSearchRequest::create(
            Language::create("en-US"),
            Currency::create("USD"),
            UserFactory::byTemporaryId("t-Id"),
            "integration test",
            null,
            0,
            20
        )->setFilters(
            FilterCollection::create()
                ->setItems(
                    ProductIdFilter::create()
                        ->setProductIds($productId)
                )
        );

        $response = $searcher->productSearch($productSearchRequest);

        self::assertNotNull($response);
    }

    public function testProductRecentlyViewedByUserFilter(): void
    {
        $searcher = $this->searcher();

        $user = UserFactory::byTemporaryId($this->fixtureId('filters-recently-viewed-user'));

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

        $response = $searcher->productSearch($productSearchRequest);

        self::assertNotNull($response);
    }
}
