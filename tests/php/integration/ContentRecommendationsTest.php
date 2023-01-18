<?php

namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\UserFactory;
use Relewise\Models\Currency;
use Relewise\Models\ContentsViewedAfterViewingContentRequest;
use Relewise\Models\Language;
use Relewise\Models\PopularContentsRequest;
use Relewise\Recommender;

class ContentRecommendationsTest extends BaseTest
{
    public function testContentsViewedAfterViewing(): void
    {
        $recommender = new Recommender($this->DATASET_ID(), $this->API_KEY());

        $contentsViewedAfterViewingContent = ContentsViewedAfterViewingContentRequest::create(
            Language::create("en-US"),
            Currency::create("USD"),
            "integration test",
            UserFactory::byTemporaryId("t-Id"),
            "1"
        );

        $response = $recommender->contentsViewedAfterViewingContent($contentsViewedAfterViewingContent);

        self::assertNotNull($response);
        self::assertNotEmpty($response->recommendations);
    }

    public function testPopularContent(): void
    {
        $recommender = new Recommender($this->DATASET_ID(), $this->API_KEY());

        $popularContents = PopularContentsRequest::create(
            Language::create("en-US"),
            Currency::create("USD"),
            "integration test",
            UserFactory::byTemporaryId("t-Id")
        )->setSinceMinutesAgo(500000);

        $response = $recommender->popularContents($popularContents);

        self::assertNotNull($response);
        self::assertNotEmpty($response->recommendations);
    }
}
