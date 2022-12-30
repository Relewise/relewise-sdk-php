<?php

namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\UserFactory;
use Relewise\Models\DTO\ContentRecommendationRequestCollection;
use Relewise\Models\DTO\ContentRecommendationRequestSettings;
use Relewise\Models\DTO\ContentsViewedAfterViewingContentRequest;
use Relewise\Models\DTO\Currency;
use Relewise\Models\DTO\Language;
use Relewise\Models\DTO\PopularContentsRequest;
use Relewise\Models\DTO\ProductAndVariantId;
use Relewise\Models\DTO\ProductRecommendationRequestCollection;
use Relewise\Models\DTO\ProductRecommendationRequestSettings;
use Relewise\Models\DTO\ProductsViewedAfterViewingProductRequest;
use Relewise\Models\DTO\PurchasedWithProductRequest;
use Relewise\Recommender;

class BatchedContentRecommendationTest extends TestCase
{
    public function testBatchedContentRecommendations(): void
    {
        $datasetId = getenv('DATASET_ID') ?: $_ENV['DATASET_ID'];
        $apiKey = getenv('API_KEY') ?: $_ENV['API_KEY'];

        $recommender = new Recommender($datasetId, $apiKey);

        $contentRecommendationRequestCollection = ContentRecommendationRequestCollection::create()
            ->withRequests(
                PopularContentsRequest::create()
                    ->withSettings(ContentRecommendationRequestSettings::create()->withNumberOfRecommendations(1))
                    ->withSinceMinutesAgo(5000)
                    ->withLanguage(Language::create()->withValue("en-US"))
                    ->withCurrency(Currency::create()->withValue("USD"))
                    ->withDisplayedAtLocationType("batched integration test")
                    ->withUser(UserFactory::byTemporaryId("t-Id")),
                ContentsViewedAfterViewingContentRequest::create()
                    ->withSettings(ContentRecommendationRequestSettings::create()->withNumberOfRecommendations(1))
                    ->withContentId("1")
                    ->withLanguage(Language::create()->withValue("en-US"))
                    ->withCurrency(Currency::create()->withValue("USD"))
                    ->withDisplayedAtLocationType("batched integration test")
                    ->withUser(UserFactory::byTemporaryId("t-Id"))
            );

        $response = $recommender->contentRecommendationRequestCollection($contentRecommendationRequestCollection);

        self::assertNotNull($response);
        self::assertNotEmpty($response->Responses);
        self::assertEquals(2, count($response->Responses));
        self::assertNotEmpty($response->Responses[0]->Recommendations);
        self::assertNotEmpty($response->Responses[1]->Recommendations);
    }
}
