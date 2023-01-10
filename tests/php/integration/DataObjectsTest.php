<?php

namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\DataValueFactory;
use Relewise\Factory\UserFactory;
use Relewise\Models\ContainsCondition;
use Relewise\Models\Currency;
use Relewise\Models\FilterCollection;
use Relewise\Models\Language;
use Relewise\Models\ProductDataFilter;
use Relewise\Models\ProductSearchRequest;
use Relewise\Models\ProductSearchSettings;
use Relewise\Models\SelectedProductPropertiesSettings;
use Relewise\Models\ValueConditionCollection;
use Relewise\Searcher;

class DataObjectsTest extends BaseTest
{
    public function testDataObjectsCanBeDeserialized(): void
    {
        $searcher = new Searcher($this->DATASET_ID(), $this->API_KEY());

        $productSearch = ProductSearchRequest::create(
            Language::create("da-dk"),
            Currency::create("DKK"),
            UserFactory::anonymous(),
            "integration test - data object",
            "1",
            0,
            0
        )->setSettings(ProductSearchSettings::create()->setSelectedProductProperties(SelectedProductPropertiesSettings::create()->setAllData(true)))
        ->setFilters(FilterCollection::create()
            ->setItems(ProductDataFilter::create("DataObject")
                ->setConditions(ValueConditionCollection::create()
                    ->setItems(
                        ContainsCondition::create()
                            ->setValue(DataValueFactory::objectDataValue(array("d" => DataValueFactory::stringDataValue("a"))))
                    )
                )
            )
        );

        $response = $searcher->productSearch($productSearch);

        self::assertNotNull($response);
        self::assertEquals(0, $response->hits);
    }
}
