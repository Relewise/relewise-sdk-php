<?php

namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\DataValueFactory;
use Relewise\Factory\UserFactory;
use Relewise\Models\Brand;
use Relewise\Models\CategoryNameAndId;
use Relewise\Models\CategoryPath;
use Relewise\Models\Currency;
use Relewise\Models\Language;
use Relewise\Models\Multilingual;
use Relewise\Models\MultilingualValue;
use Relewise\Models\SelectedVariantPropertiesSettings;
use Relewise\Models\ProductVariant;
use Relewise\Searcher;
use Relewise\Tracker;
use Relewise\Models\Product;
use Relewise\Models\ProductSearchRequest;
use Relewise\Models\ProductSearchSettings;
use Relewise\Models\ProductUpdate;
use Relewise\Models\ProductView;
use Relewise\Models\SelectedProductPropertiesSettings;
use Relewise\Models\TrackProductUpdateRequest;
use Relewise\Models\TrackProductViewRequest;
use Relewise\Models\ProductUpdateUpdateKind;

class TrackerTest extends BaseTestCase
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
                    ->addToData("SomeString", DataValueFactory::string("SomeValue"))
                    ->addToData("SomeObject", DataValueFactory::object(array("SomeString" => DataValueFactory::string("SomeValue"))))
                    ->addToData("SomeStringList", DataValueFactory::stringList("FirstString", "SecondString"))
                    ->addToData("SomeBooleanList", DataValueFactory::booleanList(true, true, false)),
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
