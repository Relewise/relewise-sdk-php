<?php

namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\DataValueFactory;
use Relewise\Factory\UserFactory;
use Relewise\Models\BrandFacet;
use Relewise\Models\BrandFacetResult;
use Relewise\Models\CategoryNameAndId;
use Relewise\Models\CategoryPath;
use Relewise\Models\CategoryFacet;
use Relewise\Models\CategoryFacetResult;
use Relewise\Models\CategorySelectionStrategy;
use Relewise\Models\CollectionFilterType;
use Relewise\Models\Currency;
use Relewise\Models\DataObjectStringValueFacet;
use Relewise\Models\DataSelectionStrategy;
use Relewise\Models\FacetingField;
use Relewise\Models\FacetSettings;
use Relewise\Models\FilterCollection;
use Relewise\Models\floatRange;
use Relewise\Models\Language;
use Relewise\Models\Multilingual;
use Relewise\Models\MultilingualValue;
use Relewise\Models\PriceRangeFacet;
use Relewise\Models\PriceRangeFacetResult;
use Relewise\Models\PriceSelectionStrategy;
use Relewise\Models\ProductDataStringValueFacet;
use Relewise\Models\ProductDataStringValueFacetResult;
use Relewise\Models\ProductFacetQuery;
use Relewise\Models\Product;
use Relewise\Models\ProductIdFilter;
use Relewise\Models\ProductSearchRequest;
use Relewise\Models\ProductUpdate;
use Relewise\Models\TrackProductUpdateRequest;
use Relewise\Models\ByHitsFacetSorting;
use Relewise\Models\FacetEvaluationMode;
use Relewise\Models\ProductDataObjectFacet;
use Relewise\Models\stringValueFacet;
use Relewise\Searcher;

class FacetsTest extends BaseTestCase
{
    public function testSalesPriceFacet(): void
    {
        $searcher = $this->searcher();

        $productSearch = ProductSearchRequest::create(
            Language::create("en-US"),
            Currency::create("USD"),
            UserFactory::anonymous(),
            "integration test",
            Null,
            0,
            0
        )->setFacets(
            ProductFacetQuery::create()
                ->setItems(
                    PriceRangeFacet::create(FacetingField::SalesPrice, PriceSelectionStrategy::Product, floatRange::create(3, 7)),
                )
        );

        $response = $searcher->productSearch($productSearch);

        self::assertNotNull($response);
        self::assertNotNull($response->facets);
        self::assertNotNull($response->facets->items);
        self::assertNotEmpty($response->facets->items);
        // Manual loop through and check to find specific FacetResult.
        self::assertTrue($response->facets->items[0] instanceof PriceRangeFacetResult);
        self::assertTrue($response->facets->items[0] instanceof PriceRangeFacetResult && $response->facets->items[0]->selected->lowerBoundInclusive == 3);
        self::assertTrue($response->facets->items[0] instanceof PriceRangeFacetResult && $response->facets->items[0]->selected->upperBoundInclusive == 7);
        // Using helper method to find specific FacetResult.
        $salesPriceFacetResult = $response->facets->salesPriceRange(PriceSelectionStrategy::Product);
        self::assertNotNull($salesPriceFacetResult);
        self::assertEquals(3, $salesPriceFacetResult->selected->lowerBoundInclusive);
        self::assertEquals(7, $salesPriceFacetResult->selected->upperBoundInclusive);
        // Validate that searching for a non-existing FacetResult returns Null when using the helper method.
        self::assertNull($response->facets->dataBoolean(DataSelectionStrategy::Product, "dataKey"));
    }

    public function testBrandFacet(): void
    {
        $searcher = $this->searcher();

        $productSearch = ProductSearchRequest::create(
            Language::create("en-US"),
            Currency::create("USD"),
            UserFactory::anonymous(),
            "integration test",
            Null,
            0,
            0
        )->setFacets(
            ProductFacetQuery::create()
                ->setItems(
                    BrandFacet::create()
                        ->setField(FacetingField::Brand)
                )
        );

        $response = $searcher->productSearch($productSearch);

        self::assertNotNull($response);
        self::assertNotNull($response->facets);
        self::assertNotNull($response->facets->items);
        self::assertNotEmpty($response->facets->items);
        self::assertTrue($response->facets->items[0] instanceof BrandFacetResult);
        self::assertEquals(FacetingField::Brand, $response->facets->brand()->field);
        self::assertNull($response->facets->dataBoolean(DataSelectionStrategy::Product, "dataKey"));
    }

    public function testProductDataFacet(): void
    {
        $searcher = $this->searcher();
        $tracker = $this->tracker();
        $productId = $this->uniqueEntityId('product-data-facet');

        $tracking = $tracker->trackProductUpdate(
            TrackProductUpdateRequest::create(
                ProductUpdate::create(
                    Product::create($productId)->addToData(
                        "ShortDescription",
                        DataValueFactory::string("data_key_1")
                    ),
                    array()
                )
            )
        );
        self::assertNull($tracking);

        $productSearch = ProductSearchRequest::create(
            Language::create("en-US"),
            Currency::create("USD"),
            UserFactory::anonymous(),
            "integration test",
            Null,
            0,
            0
        )->setFacets(
            ProductFacetQuery::create()
                ->setItems(
                    ProductDataStringValueFacet::create(
                        DataSelectionStrategy::Product,
                        "ShortDescription",
                        array("data_key_1"),
                        CollectionFilterType::And
                    )->setField(FacetingField::Data)
                )
        )->setFilters(
            FilterCollection::create(
                ProductIdFilter::create()->setProductIds($productId)
            )
        );

        try {
            $response = $this->assertEventually(
                static fn () => $searcher->productSearch($productSearch),
                static function ($candidate): bool {
                    $facet = $candidate->facets?->dataString(DataSelectionStrategy::Product, "ShortDescription");

                    return $facet instanceof ProductDataStringValueFacetResult
                        && count($facet->available) > 0;
                },
                sprintf('temporary product %s contributes to the product data facet', $productId)
            );

            self::assertNotNull($response);
            self::assertNotNull($response->facets);
            self::assertNotNull($response->facets->items);
            self::assertNotEmpty($response->facets->items);
            self::assertTrue($response->facets->items[0] instanceof ProductDataStringValueFacetResult);
            self::assertEquals(FacetingField::Data, $response->facets->dataString(DataSelectionStrategy::Product, "ShortDescription")->field);
            self::assertNull($response->facets->dataBoolean(DataSelectionStrategy::Product, "dataKey"));
        } finally {
            $this->deleteProduct($tracker, $productId);
        }
    }

    public function testCategoryFacet(): void
    {
        $searcher = $this->searcher();

        $productSearch = ProductSearchRequest::create(
            Language::create("en-US"),
            Currency::create("USD"),
            UserFactory::anonymous(),
            "integration test",
            Null,
            0,
            0
        )->setFacets(
            ProductFacetQuery::create()
                ->setItems(
                    CategoryFacet::create(CategorySelectionStrategy::ImmediateParent)
                        ->setField(FacetingField::Category)
                )
        );

        $response = $searcher->productSearch($productSearch);

        self::assertNotNull($response);
        self::assertNotNull($response->facets);
        self::assertNotNull($response->facets->items);
        self::assertNotEmpty($response->facets->items);
        self::assertTrue($response->facets->items[0] instanceof CategoryFacetResult);
        self::assertEquals(FacetingField::Category, $response->facets->category(CategorySelectionStrategy::ImmediateParent)->field);
        self::assertNull($response->facets->dataBoolean(DataSelectionStrategy::Product, "dataKey"));
    }

    public function testFacetSorting(): void
    {
        $searcher = $this->searcher();
        $tracker = $this->tracker();
        $language = Language::create($this->TEST_LANGUAGE());
        $productIds = array();
        $categoryIds = array();

        try {
            foreach (array(4, 3, 2, 1) as $categoryNumber => $productCount) {
                $categoryId = $this->uniqueEntityId(sprintf('facet-sorting-category-%d', $categoryNumber));
                $categoryIds[] = $categoryId;

                for ($productNumber = 0; $productNumber < $productCount; $productNumber++) {
                    $productId = $this->uniqueEntityId(sprintf('facet-sorting-product-%d-%d', $categoryNumber, $productNumber));
                    $productIds[] = $productId;

                    $tracking = $tracker->trackProductUpdate(
                        TrackProductUpdateRequest::create(
                            ProductUpdate::create(
                                Product::create($productId)->setCategoryPaths(
                                    CategoryPath::create(
                                        CategoryNameAndId::create(
                                            $categoryId,
                                            Multilingual::create(
                                                MultilingualValue::create($language, sprintf('Facet sorting category %d', $categoryNumber))
                                            )
                                        )
                                    )
                                ),
                                array()
                            )
                        )
                    );
                    self::assertNull($tracking);
                }
            }

            $productSearch = ProductSearchRequest::create(
                $language,
                Currency::create("USD"),
                UserFactory::anonymous(),
                "integration test",
                Null,
                0,
                0
            )->setFacets(
                ProductFacetQuery::create()
                    ->setItems(
                        CategoryFacet::create(CategorySelectionStrategy::ImmediateParent)
                            ->setField(FacetingField::Category)
                            ->setSettings(
                                FacetSettings::create()
                                ->setSorting(ByHitsFacetSorting::create())
                                ->setTake(4))
                    )
            )->setFilters(
                FilterCollection::create(
                    ProductIdFilter::create()->setProductIdsFromArray($productIds)
                )
            );

            $response = $this->assertEventually(
                static fn () => $searcher->productSearch($productSearch),
                static function ($candidate): bool {
                    $facet = $candidate->facets?->category(CategorySelectionStrategy::ImmediateParent);
                    if (!$facet instanceof CategoryFacetResult || count($facet->available) !== 4) {
                        return false;
                    }

                    for ($index = 1; $index < count($facet->available); $index++) {
                        if ($facet->available[$index - 1]->hits <= $facet->available[$index]->hits) {
                            return false;
                        }
                    }

                    return true;
                },
                'four temporary categories are sorted by descending product hits'
            );

            self::assertNotNull($response);
            self::assertNotNull($response->facets);
            self::assertNotNull($response->facets->items);
            self::assertNotEmpty($response->facets->items);
            self::assertEquals(4, count($response->facets->category(CategorySelectionStrategy::ImmediateParent)->available));
            self::assertSame(
                array(4, 3, 2, 1),
                array_map(
                    static fn ($available): int => $available->hits,
                    $response->facets->category(CategorySelectionStrategy::ImmediateParent)->available
                )
            );
        } finally {
            foreach ($productIds as $productId) {
                $this->deleteProduct($tracker, $productId);
            }
            foreach ($categoryIds as $categoryId) {
                $this->deleteProductCategory($tracker, $categoryId);
            }
        }
    }

    public function testDataObjectFacetEvaluationMode(): void
    {
        $searcher = $this->searcher();

        $productSearch = ProductSearchRequest::create(
            Language::create("da-dk"),
            Currency::create("DKK"),
            UserFactory::anonymous(),
            "integration test",
            Null,
            0,
            1
        )->setFacets(
            ProductFacetQuery::create()
                ->setItems(
                    ProductDataObjectFacet::create(
                        "SomeObject",
                    )->addToItems(DataObjectStringValueFacet::create("SomeString", null, CollectionFilterType::Or))
                    ->setDataSelectionStrategy(DataSelectionStrategy::Product)
                    ->setEvaluationMode(FacetEvaluationMode::And)
                )
        );

        $response = $searcher->productSearch($productSearch);

        self::assertNotNull($response);
        self::assertNotNull($response->facets);
        self::assertNotNull($response->facets->items);
        self::assertNotEmpty($response->facets->items);

        self::assertEquals(FacetEvaluationMode::And, $response->facets->dataObject(DataSelectionStrategy::Product, "SomeObject")->evaluationMode);
    }
}
