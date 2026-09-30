<?php

namespace Relewise\Tests\Integration;

use Relewise\Factory\DataValueFactory;
use Relewise\Factory\UserFactory;
use Relewise\Models\Brand;
use Relewise\Models\CategoryNameAndId;
use Relewise\Models\CategoryPath;
use Relewise\Models\Channel;
use Relewise\Models\Currency;
use Relewise\Models\FilterCollection;
use Relewise\Models\Language;
use Relewise\Models\Multilingual;
use Relewise\Models\MultilingualValue;
use Relewise\Models\ProductAdministrativeActionUpdateKind;
use Relewise\Models\ProductVariant;
use Relewise\Models\Product;
use Relewise\Models\ProductAdministrativeAction;
use Relewise\Models\ProductIdFilter;
use Relewise\Models\ProductUpdate;
use Relewise\Models\ProductView;
use Relewise\Models\TrackProductUpdateRequest;
use Relewise\Models\TrackProductViewRequest;
use Relewise\Models\ProductUpdateUpdateKind;
use Relewise\Models\TrackProductAdministrativeActionRequest;

class TrackerTest extends BaseTestCase
{
    public function testProductView(): void
    {
        $tracker = $this->tracker();
        $productId = $this->fixtureId('tracker-product-view-product');
        $variantId = $this->fixtureId('tracker-product-view-variant');
        $this->deleteFixtureProductAfterTest($productId);
        $tracking = $tracker->trackProductUpdate(TrackProductUpdateRequest::create(
            ProductUpdate::create(
                Product::create($productId),
                array(ProductVariant::create($variantId)),
                ProductUpdateUpdateKind::ReplaceProvidedProperties
            )
        ));
        self::assertNull($tracking);

        $userId = $this->fixtureUserId('tracker-product-view-user');
        $user = UserFactory::byTemporaryId($userId)
            ->setAuthenticatedId($userId)
            ->setChannel(Channel::create("Channel-1"));

        $productViewRequest = TrackProductViewRequest::create(
            ProductView::create(
                $user,
                Product::create($productId),
                ProductVariant::create($variantId)
            )
        );

        $response = $tracker->trackProductView($productViewRequest);
        self::assertNull($response);
    }

    public function testProductUpdateWithVariant(): void
    {
        // Create Product by tracking it.
        $tracker = $this->tracker();
        $productId = $this->fixtureId('tracker-product-variant-product');
        $variantId = $this->fixtureId('tracker-product-variant-variant');
        $firstCategoryId = $this->fixtureId('tracker-product-variant-category-1');
        $secondCategoryId = $this->fixtureId('tracker-product-variant-category-2');
        $brandId = $this->fixtureId('tracker-product-variant-brand');
        $this->deleteFixtureProductAfterTest($productId);
        $this->deleteFixtureProductCategoryAfterTest($firstCategoryId);
        $this->deleteFixtureProductCategoryAfterTest($secondCategoryId);
        $this->deleteFixtureBrandAfterTest($brandId);

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
                        Brand::create($brandId)
                            ->setDisplayName("MyBrand1")
                    )
                    ->setCategoryPaths(CategoryPath::create(CategoryNameAndId::create($firstCategoryId, Multilingual::create(MultilingualValue::create(Language::create("da-dk"), "Category 1"))), CategoryNameAndId::create($secondCategoryId, Multilingual::create(MultilingualValue::create(Language::create("da-dk"), "Category 2")))))
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
    }
    
    public function testDeleteAdministrativeAction(): void
    {
        $tracker = $this->tracker();
        $productId = $this->fixtureId('tracker-delete-product');
        $this->deleteFixtureProductAfterTest($productId);

        $productUpdate = TrackProductUpdateRequest::create(
            ProductUpdate::create(
                Product::create($productId),
                array(),
                ProductUpdateUpdateKind::ReplaceProvidedProperties
            )
        );

        $tracking = $tracker->trackProductUpdate($productUpdate);
        self::assertNull($tracking);

        $this->deleteProduct($tracker, $productId);
    }
    
    public function testDisableAdministrativeAction(): void
    {
        $tracker = $this->tracker();
        $productId = $this->fixtureId('tracker-disable-product');
        $this->deleteFixtureProductAfterTest($productId);

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
    }
}
