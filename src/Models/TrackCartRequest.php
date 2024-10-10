<?php declare(strict_types=1);

namespace Relewise\Models;

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
    
    function setCart(Cart $cart)
    {
        $this->cart = $cart;
        return $this;
    }
}
