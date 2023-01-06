<?php

namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\UserFactory;
use Relewise\Models\DTO\Currency;
use Relewise\Models\DTO\ContentsViewedAfterViewingContentRequest;
use Relewise\Models\DTO\Language;
use Relewise\Models\DTO\PopularContentsRequest;
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
        $datasetId = getenv('DATASET_ID') ?: $_ENV['DATASET_ID'];
        $apiKey = getenv('API_KEY') ?: $_ENV['API_KEY'];

        $recommender = new Recommender($this->DATASET_ID(), $this->API_KEY());

        $popularContents = PopularContentsRequest::create(
            Language::create("en-US"),
            Currency::create("USD"),
            "integration test",
            UserFactory::byTemporaryId("t-Id")
        )->withSinceMinutesAgo(5000);

        $response = $recommender->popularContents($popularContents);

        self::assertNotNull($response);
        self::assertNotEmpty($response->recommendations);
    }
}
