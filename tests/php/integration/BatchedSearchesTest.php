<?php

namespace Relewise\Tests\Integration;

use Relewise\Factory\UserFactory;
use Relewise\Models\Currency;
use Relewise\Models\Language;
use Relewise\Models\ProductCategorySearchRequest;
use Relewise\Models\ProductSearchRequest;
use Relewise\Models\SearchRequestCollection;
use Relewise\Models\SearchTermPredictionRequest;
use Relewise\Searcher;

class BatchedSearchesTest extends BaseTest
{
    public function testBatchedSearch(): void
    {
        $searcher = new Searcher($this->DATASET_ID(), $this->API_KEY());

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