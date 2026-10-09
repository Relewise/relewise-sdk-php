<?php

namespace Relewise\Tests\Integration;

use Relewise\Factory\UserFactory;
use Relewise\Models\CategoryScope;
use Relewise\Models\Currency;
use Relewise\Models\DataDoubleSelector;
use Relewise\Models\FilterCollection;
use Relewise\Models\Language;
use Relewise\Models\ProductCategoryIdFilter;
use Relewise\Models\ProductCategorySearchRequest;
use Relewise\Models\ProductDataRelevanceModifier;
use Relewise\Models\ProductHighlightProps;
use Relewise\Models\ProductIdFilter;
use Relewise\Models\ProductProductHighlightPropsHighlightSettingsLimits;
use Relewise\Models\ProductProductHighlightPropsHighlightSettingsResponseShape;
use Relewise\Models\ProductSearchRequest;
use Relewise\Models\ProductSearchSettings;
use Relewise\Models\ProductSearchSettingsHighlightSettings;
use Relewise\Models\RelevanceModifierCollection;
use Relewise\Models\ProductProductHighlightPropsHighlightSettingsOffsetSettings;

class SearchTest extends BaseTestCase
{
    public function testProductSearchWithNoConditions(): void
    {
        $searcher = $this->searcher();

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
    }

    public function testProductCategorySearchWithNoConditions(): void
    {
        $searcher = $this->searcher();

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
    }

    public function testProductSearchWithCategoryFilter(): void
    {
        $searcher = $this->searcher();
        $productId = $this->fixtureId('search-product');
        $categoryId = $this->fixtureId('search-category');

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
                    ->setCategoryIds($categoryId)
            )
        );

        $response = $searcher->productSearch($productSearch);

        self::assertNotNull($response);
        self::assertCount(1, $response->results);
        self::assertSame($productId, $response->results[0]->productId);
    }

    public function testProductSearchWithHighlight(): void
    {
        $productId = $this->fixtureId('search-product');
        $language = Language::create($this->TEST_LANGUAGE());

        $searcher = $this->searcher();

        $productSearch = ProductSearchRequest::create(
            $language,
            Currency::create("USD"),
            UserFactory::anonymous(),
            "integration test",
            "highlighted",
            0,
            3
        )->setSettings(
            ProductSearchSettings::create()
                ->setHighlight(ProductSearchSettingsHighlightSettings::create()
                    ->setEnabled(true)
                    ->setLimit(ProductProductHighlightPropsHighlightSettingsLimits::create()
                        ->setMaxSnippetsPerField(1)
                        ->setMaxSnippetsPerEntry(1)
                        ->setMaxEntryLimit(1)
                    )
                    ->setHighlightable(ProductHighlightProps::create()
                        ->setDisplayName(true)
                    )
                    ->setShape(ProductProductHighlightPropsHighlightSettingsResponseShape::create()
                        ->setOffsets(ProductProductHighlightPropsHighlightSettingsOffsetSettings::create()
                            ->setInclude(true)     
                        )
                    )
                )
        )->setFilters(
            FilterCollection::create(
                ProductIdFilter::create()->setProductIds($productId)
            )
        );

        $response = $searcher->productSearch($productSearch);

        self::assertNotNull($response);
    }
}
