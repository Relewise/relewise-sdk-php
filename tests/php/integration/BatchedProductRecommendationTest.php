<?php

namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\UserFactory;
use Relewise\Models\DTO\Currency;
use Relewise\Models\DTO\Language;
use Relewise\Models\DTO\ProductAndVariantId;
use Relewise\Models\DTO\ProductRecommendationRequestCollection;
use Relewise\Models\DTO\ProductRecommendationRequestSettings;
use Relewise\Models\DTO\ProductsViewedAfterViewingProductRequest;
use Relewise\Models\DTO\PurchasedWithProductRequest;
use Relewise\Recommender;

class BatchedProductRecommendationTest extends TestCase
{
    public function testBatchedProductRecommendations(): void
    {
        $datasetId = getenv('DATASET_ID') ?: $_ENV['DATASET_ID'];
        $apiKey = getenv('API_KEY') ?: $_ENV['API_KEY'];

        $recommender = new Recommender($datasetId, $apiKey);

        $productRecommendationRequestCollection = ProductRecommendationRequestCollection::create(
            false,
            ProductsViewedAfterViewingProductRequest::create(
                Language::create("en-US"),
                Currency::create("USD"),
                "batched integration test",
                UserFactory::byTemporaryId("t-Id"),
                ProductAndVariantId::create("1")
            )->withSettings(ProductRecommendationRequestSettings::create()->withNumberOfRecommendations(1)),
            PurchasedWithProductRequest::create(
                Language::create("en-US"),
                Currency::create("USD"),
                "batched integration test",
                UserFactory::byTemporaryId("t-Id"),
                ProductAndVariantId::create("1")
            )->withSettings(ProductRecommendationRequestSettings::create()->withNumberOfRecommendations(1))
        );

        $response = $recommender->batchProductRecommendation($productRecommendationRequestCollection);

        self::assertNotNull($response);
        self::assertNotEmpty($response->responses);
        self::assertEquals(2, count($response->responses));
        self::assertNotEmpty($response->responses[0]->recommendations);
        self::assertNotEmpty($response->responses[1]->recommendations);
    }
}
