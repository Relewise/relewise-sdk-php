<?php

namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\DataValueFactory;
use Relewise\Factory\UserFactory;
use Relewise\Models\DTO\ContainsCondition;
use Relewise\Models\DTO\Currency;
use Relewise\Models\DTO\FilterCollection;
use Relewise\Models\DTO\Language;
use Relewise\Models\DTO\ProductDataFilter;
use Relewise\Models\DTO\ProductSearchRequest;
use Relewise\Models\DTO\ProductSearchSettings;
use Relewise\Models\DTO\SelectedProductPropertiesSettings;
use Relewise\Models\DTO\ValueConditionCollection;
use Relewise\Searcher;

class DataObjectsTest extends TestCase
{
    public function testDataObjectsCanBeDeserialized(): void
    {
        $datasetId = getenv('DATASET_ID') ?: $_ENV['DATASET_ID'];
        $apiKey = getenv('API_KEY') ?: $_ENV['API_KEY'];

        $searcher = new Searcher($datasetId, $apiKey);

        $productSearch = ProductSearchRequest::create()
            ->withSettings(ProductSearchSettings::create()->withSelectedProductProperties(SelectedProductPropertiesSettings::create()->withAllData(true)))
            ->withFilters(FilterCollection::create()
                ->withItems(ProductDataFilter::create()
                    ->withKey("DataObject")
                    ->withConditions(ValueConditionCollection::create()
                        ->withItems(
                            ContainsCondition::create()
                                ->withValue(DataValueFactory::objectDataValue(array("d" => DataValueFactory::stringDataValue("a"))))
                        )
                    )
                )
            )
            ->withTake(3)
            ->withLanguage(Language::create()->withValue("da"))
            ->withCurrency(Currency::create()->withValue("DKK"))
            ->withDisplayedAtLocation("integration test - data object")
            ->withUser(UserFactory::anonymous());

        $response = $searcher->productSearchRequest($productSearch);

        fwrite(STDOUT, json_encode($response));

        self::assertNotNull($response);
        // TODO: This test should actually return 0 as shown in the original test, but it sounds like it is a work in progress to have these filters actually apply.
        // Context: https://github.com/Relewise/relewise-sdk-javascript/blob/main/lib/tests/integration-tests/data-objects.test.ts-disabled#L17
        self::assertEquals(0, $response->hits);
    }
}
