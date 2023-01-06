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

class SearchTermPredictionTest extends BaseTest
{
    public function testSearchTermPrediction(): void
    {
        $searcher = new Searcher($this->DATASET_ID(), $this->API_KEY());

        $searchTermPrediction = SearchTermPredictionRequest::create(
            Language::create("en-US"),
            Currency::create("USD"),
            UserFactory::byTemporaryId("t-Id"),
            "integration test",
            "1",
            1
        )->setSettings(
            SearchTermPredictionSettings::create()
                ->setTargetEntityTypes(EntityType::Product, EntityType::Content)
        );

        $response = $searcher->searchTermPrediction($searchTermPrediction);

        self::assertNotNull($response);
        self::assertNotEmpty($response->predictions);
    }
}
