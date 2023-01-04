<?php

namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\UserFactory;
use Relewise\Models\DTO\Currency;
use Relewise\Models\DTO\ContentsViewedAfterViewingContentRequest;
use Relewise\Models\DTO\Language;
use Relewise\Models\DTO\PopularContentsRequest;
use Relewise\Recommender;

class ContentRecommendationsTest extends TestCase
{
    public function testContentsViewedAfterViewing(): void
    {
        $datasetId = getenv('DATASET_ID') ?: $_ENV['DATASET_ID'];
        $apiKey = getenv('API_KEY') ?: $_ENV['API_KEY'];

        $recommender = new Recommender($datasetId, $apiKey);

        $contentsViewedAfterViewingContent = ContentsViewedAfterViewingContentRequest::create()
            ->withContentId("1")
            ->withLanguage(Language::create("en-US"))
            ->withCurrency(Currency::create("USD"))
            ->withDisplayedAtLocationType("integration test")
            ->withUser(UserFactory::byTemporaryId("t-Id"));

        $response = $recommender->contentsViewedAfterViewingContent($contentsViewedAfterViewingContent);

        self::assertNotNull($response);
        self::assertNotEmpty($response->recommendations);
    }

    public function testPopularContent(): void
    {
        $datasetId = getenv('DATASET_ID') ?: $_ENV['DATASET_ID'];
        $apiKey = getenv('API_KEY') ?: $_ENV['API_KEY'];

        $recommender = new Recommender($datasetId, $apiKey);

        $popularContents = PopularContentsRequest::create()
            ->withSinceMinutesAgo(5000)
            ->withLanguage(Language::create("en-US"))
            ->withCurrency(Currency::create("USD"))
            ->withDisplayedAtLocationType("integration test")
            ->withUser(UserFactory::byTemporaryId("t-Id"));

        $response = $recommender->popularContents($popularContents);

        self::assertNotNull($response);
        self::assertNotEmpty($response->recommendations);
    }
}
