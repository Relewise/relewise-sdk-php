<?php

namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\DataValueFactory;
use Relewise\Factory\UserFactory;
use Relewise\Models\DTO\Brand;
use Relewise\Models\DTO\CategoryNameAndId;
use Relewise\Models\DTO\CategoryPath;
use Relewise\Models\DTO\Currency;
use Relewise\Models\DTO\Language;
use Relewise\Models\DTO\Multilingual;
use Relewise\Models\DTO\MultilingualValue;
use Relewise\Models\DTO\SelectedVariantPropertiesSettings;
use Relewise\Models\DTO\ProductVariant;
use Relewise\Searcher;
use Relewise\Tracker;
use Relewise\Models\DTO\Product;
use Relewise\Models\DTO\ProductSearchRequest;
use Relewise\Models\DTO\ProductSearchSettings;
use Relewise\Models\DTO\ProductUpdate;
use Relewise\Models\DTO\ProductView;
use Relewise\Models\DTO\SelectedProductPropertiesSettings;
use Relewise\Models\DTO\TrackProductUpdateRequest;
use Relewise\Models\DTO\TrackProductViewRequest;
use Relewise\Models\DTO\ProductUpdateUpdateKind;

class TrackerTest extends BaseTest
{
    public function testProductView(): void
    {
        $tracker = new Tracker($this->DATASET_ID(), $this->API_KEY());

        $productViewRequest = TrackProductViewRequest::create(
            ProductView::create(
                UserFactory::byTemporaryId("t-Id"),
                Product::create("p-1"),
                ProductVariant::create()->setId("v-1")
            )
        );

        $response = $tracker->trackProductView($productViewRequest);
        self::assertNull($response);
    }

    public function testProductUpdateWithVariant(): void
    {
        // Create Product by tracking it.
        $tracker = new Tracker($this->DATASET_ID(), $this->API_KEY());

        $productUpdate = TrackProductUpdateRequest::create(
            ProductUpdate::create(
                Product::create("p-1")
                    ->setDisplayName(
                        Multilingual::create()
                            ->setValues(
                                MultilingualValue::create(Language::create("da-dk"), "MyProduct1")
                            )
                    )
                    ->setBrand(
                        Brand::create("b-1")
                            ->setDisplayName("MyBrand1")
                    )
                    ->setCategoryPaths(CategoryPath::create(CategoryNameAndId::create("c-1", Multilingual::create(MultilingualValue::create(Language::create("da-dk"), "Category 1")))))
                    ->addToData("SomeString", DataValueFactory::stringDataValue("SomeValue"))
                    ->addToData("SomeObject", DataValueFactory::objectDataValue(array("SomeString" => DataValueFactory::stringDataValue("SomeValue"))))
                    ->addToData("SomeStringList", DataValueFactory::stringListDataValue("FirstString", "SecondString"))
                    ->addToData("SomeBooleanList", DataValueFactory::booleanListDataValue(true, true, false)),
                ProductUpdateUpdateKind::ReplaceProvidedProperties
            )->setVariants(
                ProductVariant::create()
                    ->setId("v-1")
                    ->setDisplayName(
                        Multilingual::create(
                            MultilingualValue::create(Language::create("da-dk"), "MyVariant1")
                        )
                    )
            )
        );

        $tracking = $tracker->trackProductUpdate($productUpdate);
        self::assertNull($tracking);

        // Validate that the product was created with search.
        $searcher = new Searcher($this->DATASET_ID(), $this->API_KEY());

        $productSearch = ProductSearchRequest::create(
            Language::create("da-dk"),
            Currency::create("DKK"),
            UserFactory::anonymous(),
            "integration test",
            "p-1",
            0,
            1
        )->setSettings(
            ProductSearchSettings::create()
                ->setSelectedVariantProperties(
                    SelectedVariantPropertiesSettings::create()
                        ->setDisplayName(true)
                )
                ->setSelectedProductProperties(
                    SelectedProductPropertiesSettings::create()
                        ->setDisplayName(true)
                )
        );

        $searchResult = $searcher->productSearch($productSearch);

        self::assertEquals(1, $searchResult->hits);
        self::assertNotEmpty($searchResult->results);
        self::assertEquals("p-1", $searchResult->results[0]->productId);
        self::assertEquals("MyProduct1", $searchResult->results[0]->displayName);
        self::assertEquals("v-1", $searchResult->results[0]->variant->variantId);
        self::assertEquals("MyVariant1", $searchResult->results[0]->variant->displayName);
    }
}
