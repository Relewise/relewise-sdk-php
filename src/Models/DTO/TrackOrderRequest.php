<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class TrackOrderRequest extends TrackingRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Tracking.TrackOrderRequest, Relewise.Client";
    public Order $order;
    public static function create(Order $order) : TrackOrderRequest
    {
        $result = new TrackOrderRequest();
        $result->order = $order;
        return $result;
    }
    public static function hydrate(array $arr) : TrackOrderRequest
    {
        $result = TrackingRequest::hydrateBase(new TrackOrderRequest(), $arr);
        if (array_key_exists("order", $arr))
        {
            $result->order = Order::hydrate($arr["order"]);
        }
        return $result;
    }
    function withOrder(Order $order)
    {
        $this->order = $order;
        return $this;
    }
}
