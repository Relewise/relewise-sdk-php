<?php

namespace Relewise\Tests\Integration;

use Relewise\Factory\UserFactory;
use Relewise\Models\Currency;
use Relewise\Models\Language;
use Relewise\Models\ProductAndVariantId;
use Relewise\Models\ProductRecommendationRequestCollection;
use Relewise\Models\ProductRecommendationRequestSettings;
use Relewise\Models\ProductsViewedAfterViewingProductRequest;
use Relewise\Models\PurchasedWithProductRequest;
use Relewise\Recommender;

class BatchedProductRecommendationTest extends BaseTestCase
{
    public function testBatchedProductRecommendations(): void
    {
        $recommender = new Recommender($this->DATASET_ID(), $this->API_KEY());

        $productRecommendationRequestCollection = ProductRecommendationRequestCollection::create(
            false,
            ProductsViewedAfterViewingProductRequest::create(
                Language::create("en-US"),
                Currency::create("USD"),
                "batched integration test",
                UserFactory::byTemporaryId("t-Id"),
                ProductAndVariantId::create("1")
            )->setSettings(ProductRecommendationRequestSettings::create()->setNumberOfRecommendations(1)),
            PurchasedWithProductRequest::create(
                Language::create("en-US"),
                Currency::create("USD"),
                "batched integration test",
                UserFactory::byTemporaryId("t-Id"),
                ProductAndVariantId::create("1")
            )->setSettings(ProductRecommendationRequestSettings::create()->setNumberOfRecommendations(1))
        );

        $response = $recommender->batchProductRecommendation($productRecommendationRequestCollection);

        self::assertNotNull($response);
        self::assertNotEmpty($response->responses);
        self::assertEquals(2, count($response->responses));
        self::assertNotEmpty($response->responses[0]->recommendations);
        self::assertNotEmpty($response->responses[1]->recommendations);
    }
}
