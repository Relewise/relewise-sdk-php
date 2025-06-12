<?php

namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\UserFactory;
use Relewise\Models\BrandFacet;
use Relewise\Models\BrandFacetResult;
use Relewise\Models\CategoryFacet;
use Relewise\Models\CategoryFacetResult;
use Relewise\Models\CategorySelectionStrategy;
use Relewise\Models\CollectionFilterType;
use Relewise\Models\Currency;
use Relewise\Models\DataSelectionStrategy;
use Relewise\Models\FacetingField;
use Relewise\Models\FacetSettings;
use Relewise\Models\floatRange;
use Relewise\Models\Language;
use Relewise\Models\PriceRangeFacet;
use Relewise\Models\PriceRangeFacetResult;
use Relewise\Models\PriceSelectionStrategy;
use Relewise\Models\ProductDataStringValueFacet;
use Relewise\Models\ProductDataStringValueFacetResult;
use Relewise\Models\ProductFacetQuery;
use Relewise\Models\ProductSearchRequest;
use Relewise\Models\ByHitsFacetSorting;
use Relewise\Searcher;

class FacetsTest extends BaseTestCase
{
    public function testSalesPriceFacet(): void
    {
        $searcher = new Searcher($this->DATASET_ID(), $this->API_KEY());

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
        $searcher = new Searcher($this->DATASET_ID(), $this->API_KEY());

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
        $searcher = new Searcher($this->DATASET_ID(), $this->API_KEY());

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
        );

        $response = $searcher->productSearch($productSearch);

        self::assertNotNull($response);
        self::assertNotNull($response->facets);
        self::assertNotNull($response->facets->items);
        self::assertNotEmpty($response->facets->items);
        self::assertTrue($response->facets->items[0] instanceof ProductDataStringValueFacetResult);
        self::assertEquals(FacetingField::Data, $response->facets->dataString(DataSelectionStrategy::Product, "ShortDescription")->field);
        self::assertNull($response->facets->dataBoolean(DataSelectionStrategy::Product, "dataKey"));
    }

    public function testCategoryFacet(): void
    {
        $datasetId = getenv('DATASET_ID') ?: $_ENV['DATASET_ID'];
        $apiKey = getenv('API_KEY') ?: $_ENV['API_KEY'];

        $searcher = new Searcher($datasetId, $apiKey);

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
        $datasetId = getenv('DATASET_ID') ?: $_ENV['DATASET_ID'];
        $apiKey = getenv('API_KEY') ?: $_ENV['API_KEY'];

        $searcher = new Searcher($datasetId, $apiKey);

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
                        ->setSettings(
                            FacetSettings::create()
                            ->setSorting(ByHitsFacetSorting::create())
                            ->setTake(4))
                )
        );

        $response = $searcher->productSearch($productSearch);

        self::assertNotNull($response);
        self::assertNotNull($response->facets);
        self::assertNotNull($response->facets->items);
        self::assertNotEmpty($response->facets->items);
        self::assertEquals(4, count($response->facets->category(CategorySelectionStrategy::ImmediateParent)->available));

        self::assertTrue(
            $response->facets->items[0] instanceof CategoryFacetResult &&
            $response->facets->items[0]->available[0]->hits > $response->facets->items[0]->available[3]->hits
        );
    }
}
