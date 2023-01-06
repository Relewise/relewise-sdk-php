<?php

namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\UserFactory;
use Relewise\Models\DTO\BrandFacet;
use Relewise\Models\DTO\CategoryFacet;
use Relewise\Models\DTO\CategorySelectionStrategy;
use Relewise\Models\DTO\CollectionFilterType;
use Relewise\Models\DTO\Currency;
use Relewise\Models\DTO\DataSelectionStrategy;
use Relewise\Models\DTO\FacetingField;
use Relewise\Models\DTO\Language;
use Relewise\Models\DTO\PriceRangeFacet;
use Relewise\Models\DTO\PriceSelectionStrategy;
use Relewise\Models\DTO\ProductDataStringValueFacet;
use Relewise\Models\DTO\ProductFacetQuery;
use Relewise\Models\DTO\ProductSearchRequest;
use Relewise\Searcher;

class FacetsTest extends BaseTest
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
        self::assertEquals("Relewise\Models\DTO\PriceRangeFacetResult", get_class($response->facets->items[0]));
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
        self::assertEquals("Relewise\Models\DTO\BrandFacetResult", get_class($response->facets->items[0]));
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
        self::assertEquals("Relewise\Models\DTO\ProductDataStringValueFacetResult", get_class($response->facets->items[0]));
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
        self::assertEquals("Relewise\Models\DTO\CategoryFacetResult", get_class($response->facets->items[0]));
        self::assertEquals(FacetingField::Category, $response->facets->items[0]->field);
    }
}
