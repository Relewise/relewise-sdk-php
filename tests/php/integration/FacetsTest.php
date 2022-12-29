<?php

namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\UserFactory;
use Relewise\Models\DTO\Currency;
use Relewise\Models\DTO\FacetingField;
use Relewise\Models\DTO\FacetSettings;
use Relewise\Models\DTO\Language;
use Relewise\Models\DTO\PriceRangeFacet;
use Relewise\Models\DTO\PriceSelectionStrategy;
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
                            ->withSettings(FacetSettings::create()->withAlwaysIncludeSelectedInAvailable(false))
                    )
            )
            ->withLanguage(Language::create()->withValue("en-us"))
            ->withCurrency(Currency::create()->withValue("USD"))
            ->withDisplayedAtLocation("integration test")
            ->withUser(
                UserFactory::anonymous()
            );

        //fwrite(STDOUT, str_replace("\"type\":", "\"\$type\":", json_encode($productSearch)));

        $response = $searcher->request("ProductSearchRequest", $productSearch);

        //fwrite(STDOUT, json_encode($response->body));

        self::assertNotNull($response->body);
        self::assertNotNull($response->body->Facets);
        self::assertNotNull($response->body->Facets->Items);
        self::assertNotEmpty($response->body->Facets->Items);
        self::assertEquals("Brand", $response->body->Facets->Items[0]->field);
    }
}
