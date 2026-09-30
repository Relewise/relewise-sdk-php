<?php

namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\DataValueFactory;
use Relewise\Factory\UserFactory;
use Relewise\Tracker;
use Relewise\Models\Money;
use Relewise\Models\Currency;
use Relewise\Models\LineItem;
use Relewise\Models\Order;
use Relewise\Models\Product;
use Relewise\Models\ProductUpdate;
use Relewise\Models\ProductUpdateUpdateKind;
use Relewise\Models\TrackOrderRequest;
use Relewise\Models\TrackProductUpdateRequest;
use Relewise\Models\User;

class GeneratedRequestsTest extends BaseTestCase
{
    public function testTrackOrderRequestWithBuilderPatternAndCreatorMethod(): void
    {
        $tracker = $this->tracker();
        $userId = $this->fixtureUserId('order-creator-user');
        $productId = $this->fixtureId('order-creator-product');
        $this->deleteFixtureProductAfterTest($productId);
        $tracker->trackProductUpdate(TrackProductUpdateRequest::create(
            ProductUpdate::create(Product::create($productId), [], ProductUpdateUpdateKind::ReplaceProvidedProperties)
        ));

        $trackOrderRequest = TrackOrderRequest::create(
            Order::create(
                UserFactory::byTemporaryId($userId)->setAuthenticatedId($userId),
                Money::create(Currency::create("DKK"), 100),
                $userId,
                array(LineItem::create(Product::create($productId), null, 1, 100)),
                "1"
            )
        );

        $response = $tracker->request('TrackOrderRequest', $trackOrderRequest);

        self::assertEquals(200, $response->code);
        self::assertEquals(null, $response->body);
    }

    // This is a regression test to test that we can still new-up classes without the create method. Don't use this style in real scenarios.
    public function testTrackOrderRequestWithBuilderPattern(): void
    {
        $tracker = $this->tracker();
        $userId = $this->fixtureUserId('order-builder-user');

        $trackOrderRequest = (new TrackOrderRequest())
            ->setOrder((new Order())
                ->setUser(UserFactory::byTemporaryId($userId)->setAuthenticatedId($userId))
                ->setSubtotal((new Money())
                    ->setAmount(100)
                    ->setCurrency((new Currency())
                        ->setValue("DKK")
                    )
                )
                ->setOrderNumber($userId));

        $response = $tracker->request('TrackOrderRequest', $trackOrderRequest);

        self::assertEquals(200, $response->code);
        self::assertEquals(null, $response->body);
    }

    // This is a regression test to test that we can still new-up classes without the create method. Don't use this style in real scenarios.
    public function testTrackOrderRequest(): void
    {
        $tracker = $this->tracker();
        $userId = $this->fixtureUserId('order-direct-user');

        $money = new Money();
        $money->amount = 100;
        $money->currency = new Currency();
        $money->currency->value = "DKK";

        $order = new Order();
        $order->user = UserFactory::byTemporaryId($userId)->setAuthenticatedId($userId);
        $order->subtotal = $money;
        $order->orderNumber = $userId;

        $trackOrderRequest = new TrackOrderRequest();
        $trackOrderRequest->order = $order;

        $response = $tracker->request('TrackOrderRequest', $trackOrderRequest);

        self::assertEquals(200, $response->code);
        self::assertEquals(null, $response->body);
    }

    // This is a regression test to test that we can use the create method of the User instead of using the factory. Don't use this style in real scenarios.
    public function testTrackOrderRequestWithUserCreateMethod(): void
    {
        $tracker = $this->tracker();
        $userId = $this->fixtureUserId('order-user-create-user');

        $money = new Money();
        $money->amount = 100;
        $money->currency = new Currency();
        $money->currency->value = "DKK";

        $order = new Order();
        $order->user = User::create($userId, $userId, null, null, null, null, null);
        $order->subtotal = $money;
        $order->orderNumber = $userId;

        $trackOrderRequest = new TrackOrderRequest();
        $trackOrderRequest->order = $order;

        $response = $tracker->request('TrackOrderRequest', $trackOrderRequest);

        self::assertEquals(200, $response->code);
        self::assertEquals(null, $response->body);
    }
}
