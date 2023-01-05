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

        $productSearch = ProductSearchRequest::create(
            Language::create("da-dk"),
            Currency::create("DKK"),
            UserFactory::anonymous(),
            "integration test - data object",
            "1",
            0,
            0
        )->withSettings(ProductSearchSettings::create()->withSelectedProductProperties(SelectedProductPropertiesSettings::create()->withAllData(true)))
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
        );

        $response = $searcher->productSearch($productSearch);

        self::assertNotNull($response);
        self::assertEquals(0, $response->hits);
    }
}
