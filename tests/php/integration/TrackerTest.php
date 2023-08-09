<?php

namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\DataValueFactory;
use Relewise\Factory\UserFactory;
use Relewise\Models\Brand;
use Relewise\Models\CategoryNameAndId;
use Relewise\Models\CategoryPath;
use Relewise\Models\CategoryScope;
use Relewise\Models\CategoryUpdateUpdateKind;
use Relewise\Models\Currency;
use Relewise\Models\Filter;
use Relewise\Models\FilterCollection;
use Relewise\Models\Language;
use Relewise\Models\Multilingual;
use Relewise\Models\MultilingualValue;
use Relewise\Models\ProductAdministrativeActionUpdateKind;
use Relewise\Models\SelectedVariantPropertiesSettings;
use Relewise\Models\ProductVariant;
use Relewise\Searcher;
use Relewise\Tracker;
use Relewise\Models\Product;
use Relewise\Models\ProductAdministrativeAction;
use Relewise\Models\ProductCategory;
use Relewise\Models\ProductCategoryIdFilter;
use Relewise\Models\ProductCategorySearchRequest;
use Relewise\Models\ProductCategorySearchSettings;
use Relewise\Models\ProductCategoryUpdate;
use Relewise\Models\ProductIdFilter;
use Relewise\Models\ProductSearchRequest;
use Relewise\Models\ProductSearchSettings;
use Relewise\Models\ProductUpdate;
use Relewise\Models\ProductView;
use Relewise\Models\SelectedProductPropertiesSettings;
use Relewise\Models\TrackProductUpdateRequest;
use Relewise\Models\TrackProductViewRequest;
use Relewise\Models\ProductUpdateUpdateKind;
use Relewise\Models\SelectedProductCategoryPropertiesSettings;
use Relewise\Models\TrackProductAdministrativeActionRequest;
use Relewise\Models\TrackProductCategoryUpdateRequest;
use Relewise\Models\VariantIdFilter;

class TrackerTest extends BaseTestCase
{
    public function testProductView(): void
    {
        $tracker = new Tracker($this->DATASET_ID(), $this->API_KEY());

        $productViewRequest = TrackProductViewRequest::create(
            ProductView::create(
                UserFactory::byTemporaryId("t-Id"),
                Product::create("p-1"),
                ProductVariant::create("v-1")
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
                    ->setCategoryPaths(CategoryPath::create(CategoryNameAndId::create("c-1", Multilingual::create(MultilingualValue::create(Language::create("da-dk"), "Category 1"))), CategoryNameAndId::create("c-2", Multilingual::create(MultilingualValue::create(Language::create("da-dk"), "Category 2")))))
                    ->addToData("SomeString", DataValueFactory::string("SomeValue"))
                    ->addToData("SomeObject", DataValueFactory::object(array("SomeString" => DataValueFactory::string("SomeValue"))))
                    ->addToData("SomeStringList", DataValueFactory::stringList("FirstString", "SecondString"))
                    ->addToData("SomeBooleanList", DataValueFactory::booleanList(true, true, false)),
                ProductUpdateUpdateKind::ReplaceProvidedProperties
            )->setVariants(
                ProductVariant::create("v-1")
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
            null,
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
                ->setExplodedVariants(1)
        )->setFilters(FilterCollection::create(
            ProductIdFilter::create()->setProductIds("p-1"),
            VariantIdFilter::create()->setVariantIds("v-1")
        ));

        $searchResult = $searcher->productSearch($productSearch);

        self::assertEquals(1, $searchResult->hits);
        self::assertNotEmpty($searchResult->results);
        self::assertEquals("p-1", $searchResult->results[0]->productId);
        self::assertEquals("MyProduct1", $searchResult->results[0]->displayName);
        self::assertEquals("v-1", $searchResult->results[0]->variant->variantId);
        self::assertEquals("MyVariant1", $searchResult->results[0]->variant->displayName);
    }
    
    public function testDeleteAdministrativeAction(): void
    {
        // Create Product by tracking it.
        $tracker = new Tracker($this->DATASET_ID(), $this->API_KEY());

        $productUpdate = TrackProductUpdateRequest::create(
            ProductUpdate::create(
                Product::create("unique_delete_test"),
                ProductUpdateUpdateKind::ReplaceProvidedProperties
            )
        );

        $tracking = $tracker->trackProductUpdate($productUpdate);
        self::assertNull($tracking);

        // Validate that the product was created with search.
        $searcher = new Searcher($this->DATASET_ID(), $this->API_KEY());

        $productSearch = ProductSearchRequest::create(
            Language::UNDEFINED,
            Currency::UNDEFINED,
            UserFactory::anonymous(),
            "integration test",
            null,
            0,
            1
        )->setFilters(FilterCollection::create(ProductIdFilter::create()->setProductIds("unique_delete_test")));

        $searchResult = $searcher->productSearch($productSearch);

        self::assertEquals(1, $searchResult->hits);

        // Delete product
        $administrativeActionRequest = TrackProductAdministrativeActionRequest::create(
            ProductAdministrativeAction::create(
                Language::UNDEFINED,
                Currency::UNDEFINED,
                ProductAdministrativeActionUpdateKind::Delete
            )->setVariantUpdateKind(ProductAdministrativeActionUpdateKind::None)
            ->setFilters(
                FilterCollection::create(ProductIdFilter::create()->setProductIds("unique_delete_test"))
            )
        );

        $tracking = $tracker->trackProductAdministrativeAction($administrativeActionRequest);
        self::assertNull($tracking);

        // Search again and don't see the product.
        $searchResult = $searcher->productSearch($productSearch);

        self::assertEquals(0, $searchResult->hits);
    }
    
    public function testDisableAdministrativeAction(): void
    {
        // Create Product by tracking it.
        $tracker = new Tracker($this->DATASET_ID(), $this->API_KEY());

        $productUpdate = TrackProductUpdateRequest::create(
            ProductUpdate::create(
                Product::create("unique_disable_test"),
                ProductUpdateUpdateKind::ReplaceProvidedProperties
            )
        );

        $tracking = $tracker->trackProductUpdate($productUpdate);
        self::assertNull($tracking);

        // Ensure that it is enabled
        $administrativeActionRequest = TrackProductAdministrativeActionRequest::create(
            ProductAdministrativeAction::create(
                Language::UNDEFINED,
                Currency::UNDEFINED,
                ProductAdministrativeActionUpdateKind::Enable
            )->setVariantUpdateKind(ProductAdministrativeActionUpdateKind::None)
            ->setFilters(
                FilterCollection::create(ProductIdFilter::create()->setProductIds("unique_disable_test"))
            )
        );
        $tracking = $tracker->trackProductAdministrativeAction($administrativeActionRequest);

        // Validate that the product was created with search.
        $searcher = new Searcher($this->DATASET_ID(), $this->API_KEY());

        $productSearch = ProductSearchRequest::create(
            Language::UNDEFINED,
            Currency::UNDEFINED,
            UserFactory::anonymous(),
            "integration test",
            null,
            0,
            1
        )->setFilters(FilterCollection::create(ProductIdFilter::create()->setProductIds("unique_disable_test")));

        $searchResult = $searcher->productSearch($productSearch);

        self::assertEquals(1, $searchResult->hits);

        // Disable product
        $administrativeActionRequest = TrackProductAdministrativeActionRequest::create(
            ProductAdministrativeAction::create(
                Language::UNDEFINED,
                Currency::UNDEFINED,
                ProductAdministrativeActionUpdateKind::Disable
            )->setVariantUpdateKind(ProductAdministrativeActionUpdateKind::None)
            ->setFilters(
                FilterCollection::create(ProductIdFilter::create()->setProductIds("unique_disable_test"))
            )
        );

        $tracking = $tracker->trackProductAdministrativeAction($administrativeActionRequest);
        self::assertNull($tracking);

        // Search again and don't see the product.
        $searchResult = $searcher->productSearch($productSearch);

        self::assertEquals(0, $searchResult->hits);
    }
}
