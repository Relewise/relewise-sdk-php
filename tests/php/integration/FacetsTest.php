<?php

namespace Relewise\Tests\Integration;

use Relewise\Factory\UserFactory;
use Relewise\Models\BrandFacet;
use Relewise\Models\CategoryFacet;
use Relewise\Models\CategorySelectionStrategy;
use Relewise\Models\CollectionFilterType;
use Relewise\Models\Currency;
use Relewise\Models\DataObjectStringValueFacet;
use Relewise\Models\DataSelectionStrategy;
use Relewise\Models\FacetingField;
use Relewise\Models\FacetSettings;
use Relewise\Models\floatRange;
use Relewise\Models\Language;
use Relewise\Models\PriceRangeFacet;
use Relewise\Models\PriceSelectionStrategy;
use Relewise\Models\ProductDataStringValueFacet;
use Relewise\Models\ProductFacetQuery;
use Relewise\Models\ProductSearchRequest;
use Relewise\Models\ByHitsFacetSorting;
use Relewise\Models\FacetEvaluationMode;
use Relewise\Models\ProductDataObjectFacet;

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
    }

    public function testProductDataFacet(): void
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
    }

    public function testFacetSorting(): void
    {
        $searcher = $this->searcher();
        $language = Language::create($this->TEST_LANGUAGE());

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
        );

        $response = $searcher->productSearch($productSearch);

        self::assertNotNull($response);
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
    }
}
