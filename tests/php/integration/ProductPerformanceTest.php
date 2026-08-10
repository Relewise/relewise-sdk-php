<?php


namespace Relewise\Tests\Integration;

use Relewise\Factory\UserFactory;
use Relewise\Models\Currency;
use Relewise\Models\FilterCollection;
use Relewise\Models\LineItem;
use Relewise\Models\Money;
use Relewise\Models\Order;
use Relewise\Models\Product;
use Relewise\Models\ProductIdFilter;
use Relewise\Models\ProductPerformanceRequest;
use Relewise\Models\ProductPerformanceRequestOrderByOptions;
use Relewise\Models\TrackOrderRequest;
use Relewise\Tests\Integration\BaseTestCase;

class ProductPerformanceTest extends BaseTestCase
{
    public function testProductPerformanceRequest(): void
    {
        $analyzer = $this->analyzer();
        $tracker = $this->tracker();
        $bestSellingProductId = $this->uniqueEntityId('performance-best-seller');
        $secondBestSellingProductId = $this->uniqueEntityId('performance-second-best');
        $productIds = array($bestSellingProductId, $secondBestSellingProductId);
        $currency = Currency::create('DKK');

        try {
            foreach (array($bestSellingProductId => 2, $secondBestSellingProductId => 1) as $productId => $orderCount) {
                for ($orderNumber = 0; $orderNumber < $orderCount; $orderNumber++) {
                    $tracking = $tracker->trackOrder(
                        TrackOrderRequest::create(
                            Order::create(
                                UserFactory::byTemporaryId($this->uniqueEntityId('performance-user')),
                                Money::create($currency, 100),
                                $this->uniqueEntityId('performance-order'),
                                array(
                                    LineItem::create(Product::create($productId), null, 1, 100)
                                )
                            )
                        )
                    );
                    self::assertNull($tracking);
                }
            }

            $request = ProductPerformanceRequest::create(
                language: null,
                currency: null,
                byVariant: false,
                numberOfResultsPerRequest: 2,
                skipNumberOfResults: 0
            )->setOrderBy(ProductPerformanceRequestOrderByOptions::RankBySales)
            ->setFromUnixTimeSeconds(time() - 60)
            ->setToUnixTimeSeconds(time() + 60)
            ->setFilters(
                FilterCollection::create(
                    ProductIdFilter::create()->setProductIdsFromArray($productIds)
                )
            );

            $response = $this->assertEventually(
                static fn () => $analyzer->productPerformance($request),
                static function ($candidate) use ($bestSellingProductId, $secondBestSellingProductId): bool {
                    return count($candidate->results) === 2
                        && $candidate->results[0]->product->productId === $bestSellingProductId
                        && count($candidate->results[0]->classifications) > 0
                        && $candidate->results[0]->classifications[0]->sales->orders === 2
                        && $candidate->results[1]->product->productId === $secondBestSellingProductId
                        && count($candidate->results[1]->classifications) > 0
                        && $candidate->results[1]->classifications[0]->sales->orders === 1;
                },
                'temporary products are ranked by their tracked order counts'
            );

            self::assertNotNull($response);
            self::assertCount(2, $response->results);
            self::assertSame($bestSellingProductId, $response->results[0]->product->productId);
            self::assertSame(2, $response->results[0]->classifications[0]->sales->orders);
            self::assertSame($secondBestSellingProductId, $response->results[1]->product->productId);
            self::assertSame(1, $response->results[1]->classifications[0]->sales->orders);
        } finally {
            foreach ($productIds as $productId) {
                $this->deleteProduct($tracker, $productId);
            }
        }
    }
}
