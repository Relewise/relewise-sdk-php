<?php

namespace Relewise\Tests\Integration;

use Relewise\Factory\UserFactory;
use Relewise\Infrastructure\HttpClient\BadRequestException;
use Relewise\Models\CategoryScope;
use Relewise\Models\Currency;
use Relewise\Models\DataDoubleSelector;
use Relewise\Models\FilterCollection;
use Relewise\Models\Language;
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
use Relewise\Models\RelevanceModifierCollection;
use Relewise\Models\ProductProductHighlightPropsHighlightSettingsOffsetSettings;
use Relewise\Models\PurchaseQualifiers;
use Relewise\Models\RecentlyPurchasedFacet;

class SearchTest extends BaseTestCase
{
    private function seedSearchProduct(string $id, string $name, string $language, ?string $categoryId = null): void
    {
        // Register cleanup before tracking so teardown also handles a partially failed setup.
        $this->deleteFixtureProductAfterTest($id);
        $displayName = \Relewise\Models\Multilingual::create(
            \Relewise\Models\MultilingualValue::create(Language::create($language), $name)
        );
        $product = \Relewise\Models\Product::create($id)->setDisplayName($displayName);
        if ($categoryId !== null) {
            $this->deleteFixtureProductCategoryAfterTest($categoryId);
            $product->setCategoryPaths(\Relewise\Models\CategoryPath::create(
                \Relewise\Models\CategoryNameAndId::create($categoryId, $displayName)
            ));
        }
        $this->tracker()->trackProductUpdate(\Relewise\Models\TrackProductUpdateRequest::create(
            \Relewise\Models\ProductUpdate::create($product, [], \Relewise\Models\ProductUpdateUpdateKind::ReplaceProvidedProperties)
        ));
    }

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
        $productId = $this->fixtureId('search-category-filter-product');
        $categoryId = $this->fixtureId('search-category-filter-category');
        // Create the filtered product so this test cannot pass merely by returning an empty response.
        $this->seedSearchProduct($productId, 'category filter product', 'en-US', $categoryId);
        $this->awaitSearchableProduct($productId, 'en-US');

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

        $response = $searcher->productSearch($productSearch);

        self::assertSame([$productId], array_map(fn($result) => $result->productId, $response->results));
    }

    public function testProductSearchWithHighlight(): void
    {
        $productId = $this->fixtureId('search-highlight-product');
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

        try {
            $response = $searcher->productSearch($productSearch);
        } catch (BadRequestException $exception) {
            if (str_contains($exception->getMessage(), "The feature: 'RecentlyPurchasedFacet' is not yet enabled")) {
                self::markTestSkipped('The RecentlyPurchasedFacet feature is not enabled for the dataset.');
            }

            throw $exception;
        }

        self::assertNotNull($response);
    }
}
