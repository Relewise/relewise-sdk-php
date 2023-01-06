<?php

namespace Relewise\Tests\Integration;

use Relewise\Factory\UserFactory;
use Relewise\Models\DTO\ContentRecommendationRequestCollection;
use Relewise\Models\DTO\ContentRecommendationRequestSettings;
use Relewise\Models\DTO\ContentsViewedAfterViewingContentRequest;
use Relewise\Models\DTO\Currency;
use Relewise\Models\DTO\Language;
use Relewise\Models\DTO\PopularContentsRequest;
use Relewise\Recommender;

class BatchedContentRecommendationTest extends BaseTest
{
    public function testBatchedContentRecommendations(): void
    {
        $recommender = new Recommender($this->DATASET_ID(), $this->API_KEY());

        $contentRecommendationRequestCollection = ContentRecommendationRequestCollection::create(
            false,
            PopularContentsRequest::create(
                Language::create("en-US"),
                Currency::create("USD"),
                "batched integration test",
                UserFactory::byTemporaryId("t-Id")
            )->withSettings(ContentRecommendationRequestSettings::create()->withNumberOfRecommendations(1))
            ->withSinceMinutesAgo(5000),
            ContentsViewedAfterViewingContentRequest::create(
                Language::create("en-US"),
                Currency::create("USD"),
                "batched integration test",
                UserFactory::byTemporaryId("t-Id"),
                "1"
            )->withSettings(ContentRecommendationRequestSettings::create()->withNumberOfRecommendations(1))
        );

        $response = $recommender->batchContentRecommendation($contentRecommendationRequestCollection);

        self::assertNotNull($response);
        self::assertNotEmpty($response->responses);
        self::assertEquals(2, count($response->responses));
        self::assertNotEmpty($response->responses[0]->recommendations);
        self::assertNotEmpty($response->responses[1]->recommendations);
    }
}
