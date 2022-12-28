<?php
namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\UserFactory;
use Relewise\Models\DTO\SearchTermPredictionRequest;
use Relewise\Models\DTO\SearchTermPredictionSettings;
use Relewise\Models\DTO\EntityType;
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
                    ->withTargetEntityTypes(array(EntityType::Product, EntityType::Content))
            );

        $response = $searcher->SearchTermPredictionRequest($searchTermPrediction);
        self::assertEquals(200, $response->code);
        self::assertEquals(null, $response->body);
    }
}
