<?php

namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\UserFactory;
use Relewise\Models\Currency;
use Relewise\Models\SearchTermPredictionRequest;
use Relewise\Models\SearchTermPredictionSettings;
use Relewise\Models\EntityType;
use Relewise\Models\Language;
use Relewise\Searcher;

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

        $response = $this->assertEventually(
            static fn () => $searcher->searchTermPrediction($searchTermPrediction),
            static fn ($candidate): bool => count($candidate->predictions) > 0,
            'the integration dataset returns predictions for fixture term 1'
        );

        self::assertNotNull($response);
        self::assertNotEmpty($response->predictions);
    }
}
