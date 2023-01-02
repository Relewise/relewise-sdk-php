<?php

namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\UserFactory;
use Relewise\Models\DTO\BrandFacet;
use Relewise\Models\DTO\CategoryFacet;
use Relewise\Models\DTO\CategorySelectionStrategy;
use Relewise\Models\DTO\Currency;
use Relewise\Models\DTO\DataSelectionStrategy;
use Relewise\Models\DTO\FacetingField;
use Relewise\Models\DTO\FacetSettings;
use Relewise\Models\DTO\Language;
use Relewise\Models\DTO\PriceRangeFacet;
use Relewise\Models\DTO\PriceSelectionStrategy;
use Relewise\Models\DTO\ProductDataStringValueFacet;
use Relewise\Models\DTO\ProductFacetQuery;
use Relewise\Models\DTO\ProductSearchRequest;
use Relewise\Searcher;

class FacetsTest extends TestCase
{
    public function testSalesPriceFacet(): void
    {
        $datasetId = getenv('DATASET_ID') ?: $_ENV['DATASET_ID'];
        $apiKey = getenv('API_KEY') ?: $_ENV['API_KEY'];

        $searcher = new Searcher($datasetId, $apiKey);

        $productSearch = ProductSearchRequest::create()
            ->withFacets(
                ProductFacetQuery::create()
                    ->withItems(
                        PriceRangeFacet::create()
                            ->withField(FacetingField::SalesPrice)
                            ->withPriceSelectionStrategy(PriceSelectionStrategy::Product)
                    )
            )
            ->withLanguage(Language::create()->withValue("en-us"))
            ->withCurrency(Currency::create()->withValue("USD"))
            ->withDisplayedAtLocation("integration test")
            ->withUser(
                UserFactory::anonymous()
            );

        $response = $searcher->productSearchRequest($productSearch);

        self::assertNotNull($response);
        self::assertNotNull($response->facets);
        self::assertNotNull($response->facets->items);
        self::assertNotEmpty($response->facets->items);
        self::assertEquals("Relewise\Models\DTO\PriceRangeFacetResult", get_class($response->facets->items[0]));
        self::assertEquals(FacetingField::SalesPrice, $response->facets->items[0]->field);
    }

    public function testBrandFacet(): void
    {
        $datasetId = getenv('DATASET_ID') ?: $_ENV['DATASET_ID'];
        $apiKey = getenv('API_KEY') ?: $_ENV['API_KEY'];

        $searcher = new Searcher($datasetId, $apiKey);

        $productSearch = ProductSearchRequest::create()
            ->withFacets(
                ProductFacetQuery::create()
                    ->withItems(
                        BrandFacet::create()
                            ->withField(FacetingField::Brand)
                    )
            )
            ->withLanguage(Language::create()->withValue("en-us"))
            ->withCurrency(Currency::create()->withValue("USD"))
            ->withDisplayedAtLocation("integration test")
            ->withUser(
                UserFactory::anonymous()
            );

        $response = $searcher->productSearchRequest($productSearch);

        self::assertNotNull($response);
        self::assertNotNull($response->facets);
        self::assertNotNull($response->facets->items);
        self::assertNotEmpty($response->facets->items);
        self::assertEquals("Relewise\Models\DTO\BrandFacetResult", get_class($response->facets->items[0]));
        self::assertEquals(FacetingField::Brand, $response->facets->items[0]->field);
    }

    public function testProductDataFacet(): void
    {
        $datasetId = getenv('DATASET_ID') ?: $_ENV['DATASET_ID'];
        $apiKey = getenv('API_KEY') ?: $_ENV['API_KEY'];

        $searcher = new Searcher($datasetId, $apiKey);

        $productSearch = ProductSearchRequest::create()
            ->withFacets(
                ProductFacetQuery::create()
                    ->withItems(
                        ProductDataStringValueFacet::create()
                            ->withField(FacetingField::Data)
                            ->withKey("ShortDescription")
                            ->withDataSelectionStrategy(DataSelectionStrategy::Product)
                    )
            )
            ->withLanguage(Language::create()->withValue("en-us"))
            ->withCurrency(Currency::create()->withValue("USD"))
            ->withDisplayedAtLocation("integration test")
            ->withUser(
                UserFactory::anonymous()
            );

        $response = $searcher->productSearchRequest($productSearch);

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

        $productSearch = ProductSearchRequest::create()
            ->withFacets(
                ProductFacetQuery::create()
                    ->withItems(
                        CategoryFacet::create()
                            ->withField(FacetingField::Category)
                            ->withCategorySelectionStrategy(CategorySelectionStrategy::ImmediateParent)
                    )
            )
            ->withLanguage(Language::create()->withValue("en-us"))
            ->withCurrency(Currency::create()->withValue("USD"))
            ->withDisplayedAtLocation("integration test")
            ->withUser(
                UserFactory::anonymous()
            );

        $response = $searcher->productSearchRequest($productSearch);

        self::assertNotNull($response);
        self::assertNotNull($response->facets);
        self::assertNotNull($response->facets->items);
        self::assertNotEmpty($response->facets->items);
        self::assertEquals("Relewise\Models\DTO\CategoryFacetResult", get_class($response->facets->items[0]));
        self::assertEquals(FacetingField::Category, $response->facets->items[0]->field);
    }
}
