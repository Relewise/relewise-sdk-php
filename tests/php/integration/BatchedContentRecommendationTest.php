<?php

namespace Relewise\Tests\Integration;

use Relewise\Factory\UserFactory;
use Relewise\Models\ContentRecommendationRequestCollection;
use Relewise\Models\ContentRecommendationRequestSettings;
use Relewise\Models\ContentsViewedAfterViewingContentRequest;
use Relewise\Models\Currency;
use Relewise\Models\Language;
use Relewise\Models\PopularContentsRequest;
use Relewise\Recommender;

class BatchedContentRecommendationTest extends BaseTestCase
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
            )->setSettings(ContentRecommendationRequestSettings::create()->setNumberOfRecommendations(1))
            ->setSinceMinutesAgo(5000),
            ContentsViewedAfterViewingContentRequest::create(
                Language::create("en-US"),
                Currency::create("USD"),
                "batched integration test",
                UserFactory::byTemporaryId("t-Id"),
                "1"
            )->setSettings(ContentRecommendationRequestSettings::create()->setNumberOfRecommendations(1))
        );

        $response = $recommender->batchContentRecommendation($contentRecommendationRequestCollection);

        self::assertNotNull($response);
        self::assertNotEmpty($response->responses);
        self::assertEquals(2, count($response->responses));
        self::assertNotEmpty($response->responses[0]->recommendations);
        self::assertNotEmpty($response->responses[1]->recommendations);
    }
}
