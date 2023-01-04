<?php

namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\DataValueFactory;
use Relewise\Factory\UserFactory;
use Relewise\Models\DTO\Brand;
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

class TrackerTest extends TestCase
{
    public function testProductView(): void
    {
        $datasetId = getenv('DATASET_ID') ?: $_ENV['DATASET_ID'];
        $apiKey = getenv('API_KEY') ?: $_ENV['API_KEY'];

        $tracker = new Tracker($datasetId, $apiKey);

        $productViewRequest = TrackProductViewRequest::create()
            ->withProductView(
                ProductView::create()
                    ->withUser(UserFactory::byTemporaryId("t-Id"))
                    ->withProduct(Product::create()->withId("p-1"))
                    ->withVariant(ProductVariant::create()->withId("v-1"))
            );

        $response = $tracker->trackProductView($productViewRequest);
        self::assertNull($response);
    }

    public function testProductUpdateWithVariant(): void
    {
        $datasetId = getenv('DATASET_ID') ?: $_ENV['DATASET_ID'];
        $apiKey = getenv('API_KEY') ?: $_ENV['API_KEY'];

        // Create Product by tracking it.
        $tracker = new Tracker($datasetId, $apiKey);

        $productUpdate = TrackProductUpdateRequest::create()
            ->withProductUpdate(
                ProductUpdate::create()
                    ->withProductUpdateKind(ProductUpdateUpdateKind::ReplaceProvidedProperties)
                    ->withProduct(
                        Product::create()
                            ->withId("p-1")
                            ->withDisplayName(
                                Multilingual::create()
                                    ->withValues(
                                        MultilingualValue::create()
                                            ->withLanguage(Language::create()->withValue("da-dk"))
                                            ->withText("MyProduct1")
                                    )
                            )
                            ->withBrand(
                                Brand::create()
                                    ->withId("b-1")
                                    ->withDisplayName("MyBrand1")
                            )
                            ->withData("SomeString", DataValueFactory::stringDataValue("SomeValue"))
                            ->withData("SomeObject", DataValueFactory::objectDataValue(array("SomeString" => DataValueFactory::stringDataValue("SomeValue"))))
                            ->withData("SomeStringList", DataValueFactory::stringListDataValue("FirstString", "SecondString"))
                            ->withData("SomeBooleanList", DataValueFactory::booleanListDataValue(true, true, false))
                    )
                    ->withVariants(
                        ProductVariant::create()
                            ->withId("v-1")
                            ->withDisplayName(
                                Multilingual::create()
                                    ->withValues(
                                        MultilingualValue::create()->withLanguage(Language::create()->withValue("da-dk"))
                                            ->withText("MyVariant1")
                                    )
                            )
                    )
            );

        $tracking = $tracker->trackProductUpdate($productUpdate);
        self::assertNull($tracking);

        // Validate that the product was created with search.
        $searcher = new Searcher($datasetId, $apiKey);

        $productSearch = ProductSearchRequest::create()
            ->withTerm("p-1")
            ->withSettings(
                ProductSearchSettings::create()
                    ->withSelectedVariantProperties(
                        SelectedVariantPropertiesSettings::create()
                            ->withDisplayName(true)
                    )
                    ->withSelectedProductProperties(
                        SelectedProductPropertiesSettings::create()
                            ->withDisplayName(true)
                    )
            )
            ->withLanguage(Language::create()->withValue("da-dk"))
            ->withTake(1);

        $searchResult = $searcher->productSearch($productSearch);

        self::assertEquals(1, $searchResult->hits);
        self::assertNotEmpty($searchResult->results);
        self::assertEquals("p-1", $searchResult->results[0]->productId);
        self::assertEquals("MyProduct1", $searchResult->results[0]->displayName);
        self::assertEquals("v-1", $searchResult->results[0]->variant->variantId);
        self::assertEquals("MyVariant1", $searchResult->results[0]->variant->displayName);
    }
}
