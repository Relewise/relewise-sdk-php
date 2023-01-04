<?php

namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\UserFactory;
use Relewise\Models\DTO\Currency;
use Relewise\Models\DTO\DataDoubleSelector;
use Relewise\Models\DTO\Language;
use Relewise\Models\DTO\ProductCategorySearchRequest;
use Relewise\Models\DTO\ProductDataRelevanceModifier;
use Relewise\Models\DTO\ProductSearchRequest;
use Relewise\Models\DTO\RelevanceModifierCollection;
use Relewise\Searcher;

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
                    ->withItems(
                        ProductDataRelevanceModifier::create()
                            ->withKey("NoveltyBoostModifier")
                            ->withMultiplierSelector(
                                DataDoubleSelector::create("NoveltyBoostModifier")
                            )
                    )
            )
            ->withTake(3)
            ->withLanguage(Language::create("en-US"))
            ->withCurrency(Currency::create("USD"))
            ->withDisplayedAtLocation("integration test")
            ->withUser(UserFactory::byTemporaryId("t-Id"));

        $response = $searcher->productSearch($productSearch);

        self::assertNotNull($response);
        self::assertGreaterThan(0, $response->hits);
        self::assertNotEmpty($response->results);
    }

    public function testProductCategorySearchWithNoConditions(): void
    {
        $datasetId = getenv('DATASET_ID') ?: $_ENV['DATASET_ID'];
        $apiKey = getenv('API_KEY') ?: $_ENV['API_KEY'];

        $searcher = new Searcher($datasetId, $apiKey);

        $productCategorySearch = ProductCategorySearchRequest::create()
            ->withRelevanceModifiers(
                RelevanceModifierCollection::create()
                    ->withItems(
                        ProductDataRelevanceModifier::create()
                            ->withKey("NoveltyBoostModifier")
                            ->withMultiplierSelector(
                                DataDoubleSelector::create("NoveltyBoostModifier")
                            )
                    )
            )
            ->withTake(3)
            ->withLanguage(Language::create("en-US"))
            ->withCurrency(Currency::create("USD"))
            ->withDisplayedAtLocation("integration test")
            ->withUser(UserFactory::byTemporaryId("t-Id"));

        $response = $searcher->productCategorySearch($productCategorySearch);

        self::assertNotNull($response);
        self::assertGreaterThan(0, $response->hits);
        self::assertNotEmpty($response->results);
    }
}
