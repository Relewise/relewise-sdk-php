<?php

namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\UserFactory;
use Relewise\Models\DTO\Currency;
use Relewise\Models\DTO\DataDoubleSelector;
use Relewise\Models\DTO\ProductSearchResponse;
use Relewise\Models\DTO\Language;
use Relewise\Models\DTO\ProductCategorySearchRequest;
use Relewise\Models\DTO\ProductCategorySearchResponse;
use Relewise\Models\DTO\ProductDataRelevanceModifier;
use Relewise\Models\DTO\ProductSearchRequest;
use Relewise\Models\DTO\ProductSearchSettings;
use Relewise\Models\DTO\RelevanceModifierCollection;
use Relewise\Models\DTO\SelectedProductPropertiesSettings;
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
                    ->withItems(array(
                        ProductDataRelevanceModifier::create()
                            ->withKey("NoveltyBoostModifier")
                            ->withMultiplierSelector(
                                DataDoubleSelector::create()
                                    ->withKey("NoveltyBoostModifier")
                            )
                    ))
            )
            ->withTake(3)
            ->withLanguage(Language::create()->withValue("en-US"))
            ->withCurrency(Currency::create()->withValue("USD"))
            ->withDisplayedAtLocation("integration test")
            ->withUser(UserFactory::byTemporaryId("t-Id"));

        $response = $searcher->productSearchRequest($productSearch);

        self::assertNotNull($response);
        self::assertGreaterThan(0, $response->Hits);
        self::assertNotEmpty($response->Results);
    }

    
    public function testProductCategorySearchWithNoConditions(): void
    {
        $datasetId = getenv('DATASET_ID') ?: $_ENV['DATASET_ID'];
        $apiKey = getenv('API_KEY') ?: $_ENV['API_KEY'];

        $searcher = new Searcher($datasetId, $apiKey);

        $productCategorySearch = ProductCategorySearchRequest::create()
            ->withRelevanceModifiers(
                RelevanceModifierCollection::create()
                    ->withItems(array(
                        ProductDataRelevanceModifier::create()
                            ->withKey("NoveltyBoostModifier")
                            ->withMultiplierSelector(
                                DataDoubleSelector::create()
                                    ->withKey("NoveltyBoostModifier")
                            )
                    ))
            )
            ->withTake(3)
            ->withLanguage(Language::create()->withValue("en-US"))
            ->withCurrency(Currency::create()->withValue("USD"))
            ->withDisplayedAtLocation("integration test")
            ->withUser(UserFactory::byTemporaryId("t-Id"));

        $response = $searcher->productCategorySearchRequest($productCategorySearch);

        self::assertNotNull($response);
        self::assertGreaterThan(0, $response->Hits);
        self::assertNotEmpty($response->Results);
    }
}
