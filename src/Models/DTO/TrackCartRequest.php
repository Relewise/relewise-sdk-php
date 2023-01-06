<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class TrackCartRequest extends TrackingRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Tracking.TrackCartRequest, Relewise.Client";
    public Cart $cart;
    public static function create(Cart $cart) : TrackCartRequest
    {
        $result = new TrackCartRequest();
        $result->cart = $cart;
        return $result;
    }
    public static function hydrate(array $arr) : TrackCartRequest
    {
        $result = TrackingRequest::hydrateBase(new TrackCartRequest(), $arr);
        if (array_key_exists("cart", $arr))
        {
            $result->cart = Cart::hydrate($arr["cart"]);
        }
        return $result;
    }
    function withCart(Cart $cart)
    {
        $this->cart = $cart;
        return $this;
    }
    function withCustom(string $key, string $value)
    {
        if (!isset($this->custom))
        {
            $this->custom = array();
        }
        $this->custom[$key] = $value;
        return $this;
    }
}