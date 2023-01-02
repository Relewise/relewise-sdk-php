<?php

namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\UserFactory;
use Relewise\Tracker;
use Relewise\Models\DTO\Money;
use Relewise\Models\DTO\Currency;
use Relewise\Models\DTO\Order;
use Relewise\Models\DTO\TrackOrderRequest;

class GeneratedRequestsTest extends TestCase
{
    public function testTrackOrderRequest(): void
    {
        $datasetId = getenv('DATASET_ID') ?: $_ENV['DATASET_ID'];
        $apiKey = getenv('API_KEY') ?: $_ENV['API_KEY'];

        $tracker = new Tracker($datasetId, $apiKey);

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

    public function testTrackOrderRequestWithBuilderPattern(): void
    {
        $datasetId = getenv('DATASET_ID') ?: $_ENV['DATASET_ID'];
        $apiKey = getenv('API_KEY') ?: $_ENV['API_KEY'];

        $tracker = new Tracker($datasetId, $apiKey);

        $trackOrderRequest = (new TrackOrderRequest())
            ->withOrder((new Order())
                ->withUser(UserFactory::byTemporaryId("t-Id"))
                ->withSubtotal((new Money())
                        ->withAmount(100)
                        ->withCurrency((new Currency())
                                ->withValue("DKK")
                        )
                )
                ->withOrderNumber("1"));

        $response = $tracker->request('TrackOrderRequest', $trackOrderRequest);

        self::assertEquals(200, $response->code);
        self::assertEquals(null, $response->body);
    }

    public function testTrackOrderRequestWithBuilderPatternAndCreatorMethod(): void
    {
        $datasetId = getenv('DATASET_ID') ?: $_ENV['DATASET_ID'];
        $apiKey = getenv('API_KEY') ?: $_ENV['API_KEY'];

        $tracker = new Tracker($datasetId, $apiKey);

        $trackOrderRequest = TrackOrderRequest::create()
            ->withOrder(
                Order::create()
                    ->withUser(UserFactory::byTemporaryId("t-Id"))
                    ->withSubtotal(
                        Money::create()
                            ->withAmount(100)
                            ->withCurrency(
                                Currency::create()
                                    ->withValue("DKK")
                            )
                    )
                    ->withOrderNumber("1")
            );

        $response = $tracker->request('TrackOrderRequest', $trackOrderRequest);

        self::assertEquals(200, $response->code);
        self::assertEquals(null, $response->body);
    }
}
