<?php
namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\UserFactory;
use Relewise\Models\DTO\Currency;
use Relewise\Models\DTO\SearchTermPredictionRequest;
use Relewise\Models\DTO\SearchTermPredictionSettings;
use Relewise\Models\DTO\EntityType;
use Relewise\Models\DTO\Language;
use Relewise\Models\DTO\SearchTermPredictionResponse;
use Relewise\Searcher;

use function Relewise\Models\DTO\withLanguages;

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
                    ->withTargetEntityTypes(array(EntityType::Product, EntityType::Content))
            )
            ->withLanguage(Language::create()->withValue("en-US"))
            ->withCurrency(Currency::create()->withValue("USD"))
            ->withDisplayedAtLocation("integration test")
            ->withUser(UserFactory::byTemporaryId("t-Id"));

        $response = $searcher->SearchTermPredictionRequest($searchTermPrediction);

        fwrite(STDOUT, json_encode($response->body, JSON_FORCE_OBJECT));

        $searchTermPredictionResponse = SearchTermPredictionResponse::hydrate($response->body);

        self::assertEquals(200, $response->code);
        self::assertNotEquals(null, $response->body);
        self::assertNotEmpty($searchTermPredictionResponse->Predictions);
    }
}
