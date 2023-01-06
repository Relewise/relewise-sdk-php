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

class SearchTest extends BaseTest
{
    public function testProductSearchWithNoConditions(): void
    {
        $searcher = new Searcher($this->DATASET_ID(), $this->API_KEY());

        $productSearch = ProductSearchRequest::create(
            Language::create("en-US"),
            Currency::create("USD"),
            UserFactory::byTemporaryId("t-Id"),
            "integration test",
            "p-1",
            0,
            3
        )->withRelevanceModifiers(
            RelevanceModifierCollection::create(
                ProductDataRelevanceModifier::create(
                    "NoveltyBoostModifier",
                    DataDoubleSelector::create("NoveltyBoostModifier")
                )
            )
        );

        $response = $searcher->productSearch($productSearch);

        self::assertNotNull($response);
        self::assertGreaterThan(0, $response->hits);
        self::assertNotEmpty($response->results);
    }

    public function testProductCategorySearchWithNoConditions(): void
    {
        $searcher = new Searcher($this->DATASET_ID(), $this->API_KEY());

        $productCategorySearch = ProductCategorySearchRequest::create(
            Language::create("en-US"),
            Currency::create("USD"),
            UserFactory::byTemporaryId("t-Id"),
            "integration test",
            Null,
            0,
            3
        )->withRelevanceModifiers(
            RelevanceModifierCollection::create(
                ProductDataRelevanceModifier::create(
                    "NoveltyBoostModifier",
                    DataDoubleSelector::create("NoveltyBoostModifier")
                )
            )
        );

        $response = $searcher->productCategorySearch($productCategorySearch);

        self::assertNotNull($response);
        self::assertGreaterThan(0, $response->hits);
        self::assertNotEmpty($response->results);
    }
}
