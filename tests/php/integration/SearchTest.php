<?php

namespace Relewise\Tests\Integration;

use Relewise\Factory\UserFactory;
use Relewise\Models\CategoryNameAndId;
use Relewise\Models\CategoryPath;
use Relewise\Models\CategoryScope;
use Relewise\Models\Currency;
use Relewise\Models\DataDoubleSelector;
use Relewise\Models\FilterCollection;
use Relewise\Models\Language;
use Relewise\Models\Multilingual;
use Relewise\Models\MultilingualValue;
use Relewise\Models\Product;
use Relewise\Models\ProductCategoryIdFilter;
use Relewise\Models\ProductCategorySearchRequest;
use Relewise\Models\ProductDataRelevanceModifier;
use Relewise\Models\ProductFacetQuery;
use Relewise\Models\ProductHighlightProps;
use Relewise\Models\ProductIdFilter;
use Relewise\Models\ProductProductHighlightPropsHighlightSettingsLimits;
use Relewise\Models\ProductProductHighlightPropsHighlightSettingsResponseShape;
use Relewise\Models\ProductSearchRequest;
use Relewise\Models\ProductSearchSettings;
use Relewise\Models\ProductSearchSettingsHighlightSettings;
use Relewise\Models\ProductUpdate;
use Relewise\Models\RelevanceModifierCollection;
use Relewise\Models\TrackProductUpdateRequest;
use Relewise\Searcher;
use Relewise\Tracker;
use Relewise\Models\ProductProductHighlightPropsHighlightSettingsOffsetSettings;
use Relewise\Models\PurchaseQualifiers;
use Relewise\Models\RecentlyPurchasedFacet;

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

        $response = $this->assertEventually(
            static fn () => $searcher->productSearch($productSearch),
            static fn ($candidate): bool => $candidate->hits > 0 && count($candidate->results) > 0,
            'fixture product p-1 is searchable'
        );

        self::assertNotNull($response);
        self::assertGreaterThan(0, $response->hits);
        self::assertNotEmpty($response->results);
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

        $response = $this->assertEventually(
            static fn () => $searcher->productCategorySearch($productCategorySearch),
            static fn ($candidate): bool => $candidate->hits > 0 && count($candidate->results) > 0,
            'the integration dataset contains searchable product categories'
        );

        self::assertNotNull($response);
        self::assertGreaterThan(0, $response->hits);
        self::assertNotEmpty($response->results);
    }

    public function testProductSearchWithCategoryFilter(): void
    {
        $searcher = $this->searcher();
        $tracker = $this->tracker();
        $productId = $this->uniqueEntityId('category-filter-product');
        $categoryId = $this->uniqueEntityId('category-filter-category');

        $tracking = $tracker->trackProductUpdate(
            TrackProductUpdateRequest::create(
                ProductUpdate::create(
                    Product::create($productId)->setCategoryPaths(
                        CategoryPath::create(
                            CategoryNameAndId::create(
                                $categoryId,
                                Multilingual::create(
                                    MultilingualValue::create(Language::create("en-US"), "Integration test category")
                                )
                            )
                        )
                    ),
                    array()
                )
            )
        );
        self::assertNull($tracking);

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
                    ->setCategoryIds($categoryId),
                ProductIdFilter::create()->setProductIds($productId)
            )
        );

        try {
            $response = $this->assertEventually(
                static fn () => $searcher->productSearch($productSearch),
                static fn ($candidate): bool => count($candidate->results) === 1
                    && $candidate->results[0]->productId === $productId,
                sprintf('temporary product %s is returned by category %s', $productId, $categoryId)
            );

            self::assertNotNull($response);
            self::assertSame(1, $response->hits);
            self::assertSame($productId, $response->results[0]->productId);
        } finally {
            $this->deleteProduct($tracker, $productId);
            $this->deleteProductCategory($tracker, $categoryId);
        }
    }

    public function testProductSearchWithHighlight(): void
    {
        $tracker = $this->tracker();
        $productId = $this->uniqueEntityId('highlight-product');
        $language = Language::create($this->TEST_LANGUAGE());

        $tracker->trackProductUpdate(TrackProductUpdateRequest::create(
            ProductUpdate::create(
                Product::create($productId)
                    ->setDisplayName(
                        Multilingual::create(
                            MultilingualValue::create($language, "the last word is highlighted")
                        )
                    ),
                array()
            )
        ));

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

        try {
            $response = $this->assertEventually(
                static fn () => $searcher->productSearch($productSearch),
                static fn ($candidate): bool => $candidate->hits > 0
                    && count($candidate->results) > 0
                    && isset($candidate->results[0]->highlight?->offsets?->displayName)
                    && count($candidate->results[0]->highlight->offsets->displayName) > 0,
                sprintf('product %s is searchable with highlight offsets', $productId)
            );

            self::assertNotNull($response);
            self::assertGreaterThan(0, $response->hits);

            $productResult = $response->results[0];

            self::assertNotNull($productResult->highlight);
            self::assertNotNull($productResult->highlight->offsets);
            self::assertNotNull($productResult->highlight->offsets->displayName);
            self::assertGreaterThan(0, count($productResult->highlight->offsets->displayName));
            self::assertEquals(17, $productResult->highlight->offsets->displayName[0]->lowerBoundInclusive);
            self::assertEquals(28, $productResult->highlight->offsets->displayName[0]->upperBoundInclusive);
        } finally {
            $this->deleteProduct($tracker, $productId);
        }
    }
    
    public function testRecentlyPurchasedFacetCanBuild(): void
    {
        $searcher = $this->searcher();

        $productSearch = ProductSearchRequest::create(
            Language::create("en-US"),
            Currency::create("USD"),
            UserFactory::byTemporaryId("t-Id"),
            "integration test",
            term: Null,
            skip: 0,
            take: 20
        )->setFacets(
            ProductFacetQuery::create()
                ->addToItems(
                    RecentlyPurchasedFacet::create(
                        PurchaseQualifiers::create(100, true, false, false)
                )
            )
        );

        $response = $searcher->productSearch($productSearch);

        self::assertNotNull($response);
    }
}

