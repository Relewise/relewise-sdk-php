<?php

namespace Relewise\Tests\Integration;

use Relewise\Factory\UserFactory;
use Relewise\Models\Currency;
use Relewise\Models\SearchTermPredictionRequest;
use Relewise\Models\SearchTermPredictionSettings;
use Relewise\Models\EntityType;
use Relewise\Models\Language;

class SearchTermPredictionTest extends BaseTestCase
{
    public function testSearchTermPrediction(): void
    {
        $searcher = $this->searcher();

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
    }
}
