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
use Relewise\Models\Channel;
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
        $tracker = $this->tracker();

        $user = UserFactory::byTemporaryId("t-Id")
            ->setChannel(Channel::create("Channel-1"));

        $productViewRequest = TrackProductViewRequest::create(
            ProductView::create(
                $user,
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
        $tracker = $this->tracker();
        $productId = $this->uniqueEntityId('product-with-variant');
        $variantId = $this->uniqueEntityId('variant');

        $productUpdate = TrackProductUpdateRequest::create(
            ProductUpdate::create(
                Product::create($productId)
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
                array(
                    ProductVariant::create($variantId)
                        ->setDisplayName(
                            Multilingual::create(
                                MultilingualValue::create(Language::create("da-dk"), "MyVariant1")
                            )
                        )
                ),
                ProductUpdateUpdateKind::ReplaceProvidedProperties
            )
        );

        $tracking = $tracker->trackProductUpdate($productUpdate);
        self::assertNull($tracking);

        // Validate that the product was created with search.
        $searcher = $this->searcher();

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
            ProductIdFilter::create()->setProductIds($productId),
            VariantIdFilter::create()->setVariantIds($variantId)
        ));

        try {
            $searchResult = $this->assertEventually(
                static fn () => $searcher->productSearch($productSearch),
                static fn ($candidate): bool => $candidate->hits === 1
                    && count($candidate->results) === 1
                    && $candidate->results[0]->productId === $productId
                    && $candidate->results[0]->displayName === 'MyProduct1'
                    && $candidate->results[0]->variant?->variantId === $variantId
                    && $candidate->results[0]->variant->displayName === 'MyVariant1',
                sprintf('product %s and variant %s are searchable with their updated properties', $productId, $variantId)
            );

            self::assertEquals(1, $searchResult->hits);
            self::assertNotEmpty($searchResult->results);
            self::assertEquals($productId, $searchResult->results[0]->productId);
            self::assertEquals("MyProduct1", $searchResult->results[0]->displayName);
            self::assertEquals($variantId, $searchResult->results[0]->variant->variantId);
            self::assertEquals("MyVariant1", $searchResult->results[0]->variant->displayName);
        } finally {
            $this->deleteProduct($tracker, $productId);
        }
    }
    
    public function testDeleteAdministrativeAction(): void
    {
        $tracker = $this->tracker();
        $searcher = $this->searcher();
        $productId = $this->uniqueEntityId('delete-product');

        $productUpdate = TrackProductUpdateRequest::create(
            ProductUpdate::create(
                Product::create($productId),
                array(),
                ProductUpdateUpdateKind::ReplaceProvidedProperties
            )
        );

        $tracking = $tracker->trackProductUpdate($productUpdate);
        self::assertNull($tracking);

        $productSearch = ProductSearchRequest::create(
            Language::UNDEFINED,
            Currency::UNDEFINED,
            UserFactory::anonymous(),
            "integration test",
            null,
            0,
            1
        )->setFilters(
            FilterCollection::create(ProductIdFilter::create()->setProductIds($productId))
        );

        $this->assertProductSearchHits($searcher, $productSearch, 1, sprintf('product %s is searchable before deletion', $productId));

        $this->deleteProduct($tracker, $productId);

        $this->assertProductSearchHits($searcher, $productSearch, 0, sprintf('product %s is no longer searchable after deletion', $productId));
    }
    
    public function testDisableAdministrativeAction(): void
    {
        $tracker = $this->tracker();
        $searcher = $this->searcher();
        $productId = $this->uniqueEntityId('disable-product');

        $productUpdate = TrackProductUpdateRequest::create(
            ProductUpdate::create(
                Product::create($productId),
                array(),
                ProductUpdateUpdateKind::ReplaceProvidedProperties
            )
        );

        $tracking = $tracker->trackProductUpdate($productUpdate);
        self::assertNull($tracking);

        $administrativeActionRequest = TrackProductAdministrativeActionRequest::create(
            ProductAdministrativeAction::create(
                Language::UNDEFINED,
                Currency::UNDEFINED,
                FilterCollection::create(ProductIdFilter::create()->setProductIds($productId)),
                ProductAdministrativeActionUpdateKind::Enable,
                ProductAdministrativeActionUpdateKind::None
            )
        );
        $tracking = $tracker->trackProductAdministrativeAction($administrativeActionRequest);
        self::assertNull($tracking);

        $productSearch = ProductSearchRequest::create(
            Language::UNDEFINED,
            Currency::UNDEFINED,
            UserFactory::anonymous(),
            "integration test",
            null,
            0,
            1
        )->setFilters(
            FilterCollection::create(ProductIdFilter::create()->setProductIds($productId))
        );

        try {
            $this->assertProductSearchHits($searcher, $productSearch, 1, sprintf('product %s is searchable while enabled', $productId));

            $administrativeActionRequest = TrackProductAdministrativeActionRequest::create(
                ProductAdministrativeAction::create(
                    Language::UNDEFINED,
                    Currency::UNDEFINED,
                    FilterCollection::create(ProductIdFilter::create()->setProductIds($productId)),
                    ProductAdministrativeActionUpdateKind::Disable,
                    ProductAdministrativeActionUpdateKind::None
                )
            );

            $tracking = $tracker->trackProductAdministrativeAction($administrativeActionRequest);
            self::assertNull($tracking);

            $this->assertProductSearchHits($searcher, $productSearch, 0, sprintf('product %s is no longer searchable after disabling', $productId));
        } finally {
            $this->deleteProduct($tracker, $productId);
        }
    }

    private function assertProductSearchHits(
        Searcher $searcher,
        ProductSearchRequest $request,
        int $expectedHits,
        string $description
    ): void {
        $response = $this->assertEventually(
            static fn () => $searcher->productSearch($request),
            static fn ($candidate): bool => $candidate->hits === $expectedHits,
            $description
        );

        self::assertSame($expectedHits, $response->hits);
    }

    private function deleteProduct(Tracker $tracker, string $productId): void
    {
        $tracking = $tracker->trackProductAdministrativeAction(
            TrackProductAdministrativeActionRequest::create(
                ProductAdministrativeAction::create(
                    Language::UNDEFINED,
                    Currency::UNDEFINED,
                    FilterCollection::create(ProductIdFilter::create()->setProductIds($productId)),
                    ProductAdministrativeActionUpdateKind::Delete,
                    ProductAdministrativeActionUpdateKind::None
                )
            )
        );

        self::assertNull($tracking);
    }
}
