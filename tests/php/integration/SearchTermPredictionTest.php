<?php

namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\UserFactory;
use Relewise\Models\DTO\Currency;
use Relewise\Models\DTO\SearchTermPredictionRequest;
use Relewise\Models\DTO\SearchTermPredictionSettings;
use Relewise\Models\DTO\EntityType;
use Relewise\Models\DTO\Language;
use Relewise\Searcher;

class SearchTermPredictionTest extends TestCase
{
    public function testSearchTermPrediction(): void
    {
        $datasetId = getenv('DATASET_ID') ?: $_ENV['DATASET_ID'];
        $apiKey = getenv('API_KEY') ?: $_ENV['API_KEY'];

        $searcher = new Searcher($datasetId, $apiKey);

        $searchTermPrediction = SearchTermPredictionRequest::create()
            ->withTerm('1')
            ->withTake(1)
            ->withSettings(
                SearchTermPredictionSettings::create()
                    ->withTargetEntityTypes(EntityType::Product, EntityType::Content)
            )
            ->withLanguage(Language::create("en-US"))
            ->withCurrency(Currency::create("USD"))
            ->withDisplayedAtLocation("integration test")
            ->withUser(UserFactory::byTemporaryId("t-Id"));

        $response = $searcher->searchTermPrediction($searchTermPrediction);

        self::assertNotNull($response);
        self::assertNotEmpty($response->predictions);
    }
}
