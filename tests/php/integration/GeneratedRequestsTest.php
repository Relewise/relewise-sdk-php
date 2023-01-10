<?php

namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\UserFactory;
use Relewise\Tracker;
use Relewise\Models\Money;
use Relewise\Models\Currency;
use Relewise\Models\Order;
use Relewise\Models\TrackOrderRequest;

class GeneratedRequestsTest extends BaseTest
{
    public function testTrackOrderRequestWithBuilderPatternAndCreatorMethod(): void
    {
        $tracker = new Tracker($this->DATASET_ID(), $this->API_KEY());

        $trackOrderRequest = TrackOrderRequest::create(
            Order::create(
                UserFactory::byTemporaryId("t-Id"),
                Money::create(Currency::create("DKK"), 100),
                "1",
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
        $tracker = new Tracker($this->DATASET_ID(), $this->API_KEY());

        $trackOrderRequest = (new TrackOrderRequest())
            ->setOrder((new Order())
                ->setUser(UserFactory::byTemporaryId("t-Id"))
                ->setSubtotal((new Money())
                    ->setAmount(100)
                    ->setCurrency((new Currency())
                        ->setValue("DKK")
                    )
                )
                ->setOrderNumber("1"));

        $response = $tracker->request('TrackOrderRequest', $trackOrderRequest);

        self::assertEquals(200, $response->code);
        self::assertEquals(null, $response->body);
    }

    // This is a regression test to test that we can still new-up classes without the create method. Don't use this style in real scenarios.
    public function testTrackOrderRequest(): void
    {
        $tracker = new Tracker($this->DATASET_ID(), $this->API_KEY());

        $money = new Money();
        $money->amount = 100;
        $money->currency = new Currency();
        $money->currency->value = "DKK";

        $order = new Order();
        $order->user = UserFactory::byTemporaryId("t-Id");
        $order->subtotal = $money;
        $order->orderNumber = "1";

        $trackOrderRequest = new TrackOrderRequest();
        $trackOrderRequest->order = $order;

        $response = $tracker->request('TrackOrderRequest', $trackOrderRequest);

        self::assertEquals(200, $response->code);
        self::assertEquals(null, $response->body);
    }
}
