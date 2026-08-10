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
use Relewise\Models\ProductUpdate;
use Relewise\Models\ProductUpdateUpdateKind;
use Relewise\Models\ProductView;
use Relewise\Models\TrackProductUpdateRequest;
use Relewise\Models\TrackProductViewRequest;
use Relewise\Searcher;
use Relewise\Tracker;

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
        self::assertEmpty($response->results);
    }

    public function testProductIdFilter(): void
    {
        $searcher = $this->searcher();
        $tracker = $this->tracker();
        $productId = $this->fixtureId('filters-product-id-product');

        $tracking = $tracker->trackProductUpdate(
            TrackProductUpdateRequest::create(
                ProductUpdate::create(
                    Product::create($productId),
                    array(),
                    ProductUpdateUpdateKind::ReplaceProvidedProperties
                )
            )
        );
        self::assertNull($tracking);

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

        $response = $this->assertEventually(
            static fn () => $searcher->productSearch($productSearchRequest),
            static fn ($candidate): bool => count($candidate->results) === 1
                && $candidate->results[0]->productId === $productId,
            sprintf('fixed fixture product %s is returned by the product ID filter', $productId)
        );

        self::assertNotNull($response);
        self::assertEquals(1, count($response->results));
        self::assertEquals($productId, $response->results[0]->productId);
    }

    public function testProductRecentlyViewedByUserFilter(): void
    {
        $tracker = $this->tracker();
        $searcher = $this->searcher();

        $user = UserFactory::byTemporaryId($this->fixtureId('filters-recently-viewed-user'));

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

        $response = $this->assertEventually(
            static fn () => $searcher->productSearch($productSearchRequest),
            static fn ($candidate): bool => count($candidate->results) === 1,
            'the tracked product view is available to the recently-viewed filter'
        );

        self::assertNotNull($response);
        self::assertEquals(1, count($response->results));
    }
}
