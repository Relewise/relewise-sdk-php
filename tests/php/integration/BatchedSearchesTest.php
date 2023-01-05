<?php

namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\UserFactory;
use Relewise\Models\DTO\Currency;
use Relewise\Models\DTO\Language;
use Relewise\Models\DTO\ProductCategorySearchRequest;
use Relewise\Models\DTO\ProductSearchRequest;
use Relewise\Models\DTO\SearchRequestCollection;
use Relewise\Models\DTO\SearchTermPredictionRequest;
use Relewise\Searcher;

class BatchedSearchesTest extends TestCase
{
    public function testBatchedSearch(): void
    {
        $datasetId = getenv('DATASET_ID') ?: $_ENV['DATASET_ID'];
        $apiKey = getenv('API_KEY') ?: $_ENV['API_KEY'];

        $searcher = new Searcher($datasetId, $apiKey);

        $searchRequestCollection = SearchRequestCollection::create(

            SearchTermPredictionRequest::create(Language::create("en-US"), Currency::create("USD"), UserFactory::anonymous(), "integration test", "", 0),
            ProductSearchRequest::create(Language::create("en-US"), Currency::create("USD"), UserFactory::anonymous(), "integration test", "a", 0, 0),
            ProductCategorySearchRequest::create(Language::create("en-US"), Currency::create("USD"), UserFactory::anonymous(), "integration test", "c", 0, 0)
        );

        $response = $searcher->batchSearch($searchRequestCollection);

        self::assertNotNull($response);
        self::assertNotEmpty($response->responses);
    }
}