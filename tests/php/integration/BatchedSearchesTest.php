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

        $searchRequestCollection = SearchRequestCollection::create()
            ->withRequests(
                SearchTermPredictionRequest::create(),
                ProductSearchRequest::create()->withTerm("a"),
                ProductCategorySearchRequest::create()->withTerm("c")
            )
            ->withLanguage(Language::create()->withValue("en-US"))
            ->withCurrency(Currency::create()->withValue("USD"))
            ->withDisplayedAtLocation("integration test")
            ->withUser(UserFactory::anonymous());

        $response = $searcher->searchRequestCollection($searchRequestCollection);

        self::assertNotNull($response);
        self::assertNotEmpty($response->Responses);
    }
}