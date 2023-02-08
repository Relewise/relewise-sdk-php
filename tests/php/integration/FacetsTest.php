<?php

namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\UserFactory;
use Relewise\Models\BrandFacet;
use Relewise\Models\CategoryFacet;
use Relewise\Models\CategorySelectionStrategy;
use Relewise\Models\CollectionFilterType;
use Relewise\Models\Currency;
use Relewise\Models\DataSelectionStrategy;
use Relewise\Models\FacetingField;
use Relewise\Models\Language;
use Relewise\Models\PriceRangeFacet;
use Relewise\Models\PriceSelectionStrategy;
use Relewise\Models\ProductDataStringValueFacet;
use Relewise\Models\ProductFacetQuery;
use Relewise\Models\ProductSearchRequest;
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
                    PriceRangeFacet::create(FacetingField::SalesPrice, PriceSelectionStrategy::Product, Null),
                )
        );

        $response = $searcher->productSearch($productSearch);

        self::assertNotNull($response);
        self::assertNotNull($response->facets);
        self::assertNotNull($response->facets->items);
        self::assertNotEmpty($response->facets->items);
        self::assertEquals("Relewise\Models\PriceRangeFacetResult", get_class($response->facets->items[0]));
        self::assertEquals(FacetingField::SalesPrice, $response->facets->items[0]->field);
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
        self::assertEquals("Relewise\Models\BrandFacetResult", get_class($response->facets->items[0]));
        self::assertEquals(FacetingField::Brand, $response->facets->items[0]->field);
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
        self::assertEquals("Relewise\Models\ProductDataStringValueFacetResult", get_class($response->facets->items[0]));
        self::assertEquals(FacetingField::Data, $response->facets->items[0]->field);
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
        self::assertEquals("Relewise\Models\CategoryFacetResult", get_class($response->facets->items[0]));
        self::assertEquals(FacetingField::Category, $response->facets->items[0]->field);
    }
}
