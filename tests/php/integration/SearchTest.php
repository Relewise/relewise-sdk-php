<?php

namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\UserFactory;
use Relewise\Models\CategoryScope;
use Relewise\Models\Currency;
use Relewise\Models\DataDoubleSelector;
use Relewise\Models\FilterCollection;
use Relewise\Models\Language;
use Relewise\Models\ProductCategoryIdFilter;
use Relewise\Models\ProductCategorySearchRequest;
use Relewise\Models\ProductDataRelevanceModifier;
use Relewise\Models\ProductSearchRequest;
use Relewise\Models\RelevanceModifierCollection;
use Relewise\Searcher;

class SearchTest extends BaseTestCase
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
        )->setRelevanceModifiers(
            RelevanceModifierCollection::create(
                ProductDataRelevanceModifier::create(
                    "NoveltyBoostModifier",
                    array(),
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
        )->setRelevanceModifiers(
            RelevanceModifierCollection::create(
                ProductDataRelevanceModifier::create(
                    "NoveltyBoostModifier",
                    array(),
                    DataDoubleSelector::create("NoveltyBoostModifier")
                )
            )
        );

        $response = $searcher->productCategorySearch($productCategorySearch);

        self::assertNotNull($response);
        self::assertGreaterThan(0, $response->hits);
        self::assertNotEmpty($response->results);
    }

    public function testProductSearchWithCategoryFilter(): void
    {
        $searcher = new Searcher($this->DATASET_ID(), $this->API_KEY());

        $productSearch = ProductSearchRequest::create(
            Language::create("en-US"),
            Currency::create("USD"),
            UserFactory::byTemporaryId("t-Id"),
            "integration test",
            term: Null,
            skip: 0,
            take: 20
        )->setFilters(
            FilterCollection::create(
                ProductCategoryIdFilter::create(CategoryScope::Ancestor)
                    ->setCategoryIds("c-1")
            )
        );

        $response = $searcher->productSearch($productSearch);

        self::assertNotNull($response);
        self::assertGreaterThan(0, $response->hits);
        self::assertNotEmpty($response->results);
    }
}
