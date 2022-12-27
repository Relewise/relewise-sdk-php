<?php
namespace Relewise\Tests\Integration;

use \PHPUnit\Framework\TestCase;
use Relewise\Factory\UserFactory;
use Relewise\RelewiseClient;
use Relewise\Models\DTO\Money;
use Relewise\Models\DTO\Currency;
use Relewise\Models\DTO\Order;
use Relewise\Models\DTO\TrackOrderRequest;

class GeneratedRequestsTest extends TestCase
{
    public function testTrackerOrderRequest(): void 
    {
        $datasetId = '***REMOVED***';
        $apiKey = '***REMOVED***';
        
        $tracker = new RelewiseClient($datasetId, $apiKey);

        $money = new Money();
        $money->Amount = 100;
        $money->Currency = new Currency();
        $money->Currency->Value = "DKK";

        $order = new Order();
        $order->User = UserFactory::byTemporaryId("t-Id");
        $order->Subtotal = $money;
        $order->OrderNumber = "1";

        $trackOrderRequest = new TrackOrderRequest();
        $trackOrderRequest->Order = $order;

        $response = $tracker->Request('TrackOrderRequest', $trackOrderRequest);

        self::assertEquals(200, $response->code);
        self::assertEquals(null, $response->body);
    }
}
