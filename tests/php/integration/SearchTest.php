<?php
namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\UserFactory;
use Relewise\Models\DTO\Currency;
use Relewise\Models\DTO\ProductSearchResponse;
use Relewise\Models\DTO\SearchTermPredictionRequest;
use Relewise\Models\DTO\SearchTermPredictionSettings;
use Relewise\Models\DTO\EntityType;
use Relewise\Models\DTO\Language;
use Relewise\Models\DTO\ProductSearchRequest;
use Relewise\Models\DTO\RelevanceModifier;
use Relewise\Models\DTO\RelevanceModifierCollection;
use Relewise\Models\DTO\SearchTermPredictionResponse;
use Relewise\Searcher;

use function Relewise\Models\DTO\withLanguages;

class SearchTest extends TestCase
{
    public function testProductSearchWithNoConditions(): void 
    {
        $datasetId = getenv('DATASET_ID') ?: $_ENV['DATASET_ID'];
        $apiKey = getenv('API_KEY') ?: $_ENV['API_KEY'];
        
        $searcher = new Searcher($datasetId, $apiKey);

        $productSearch = ProductSearchRequest::create()
            ->withRelevanceModifiers(
                RelevanceModifierCollection::create()
            )
            ->withLanguage(Language::create()->withValue("en-US"))
            ->withCurrency(Currency::create()->withValue("USD"))
            ->withDisplayedAtLocation("integration test")
            ->withUser(UserFactory::byTemporaryId("t-Id"));

        $response = $searcher->searchProductSearchRequest($productSearch);

        $searchTermPredictionResponse = ProductSearchResponse::hydrate($response->body);

        self::assertEquals(200, $response->code);
        self::assertNotEquals(null, $response->body);
        self::assertNotEmpty($searchTermPredictionResponse->Results);
    }
}
