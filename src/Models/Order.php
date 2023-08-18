<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class Order extends Trackable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Order, Relewise.Client";
    public User $user;
    public Money $subtotal;
    public array $lineItems;
    public string $orderNumber;
    public string $cartName;
    public ?string $channel;
    public ?string $subChannel;
    /** @deprecated Use OrderNumber instead. */
    public ?string $trackingNumber;
    public static function create(User $user, Money $subtotal, string $orderNumber, array $lineItems, string $cartName = "default") : Order
    {
        $result = new Order();
        $result->user = $user;
        $result->subtotal = $subtotal;
        $result->orderNumber = $orderNumber;
        $result->lineItems = $lineItems;
        $result->cartName = $cartName;
        return $result;
    }
    public static function hydrate(array $arr) : Order
    {
        $result = Trackable::hydrateBase(new Order(), $arr);
        if (array_key_exists("user", $arr))
        {
            $result->user = User::hydrate($arr["user"]);
        }
        if (array_key_exists("subtotal", $arr))
        {
            $result->subtotal = Money::hydrate($arr["subtotal"]);
        }
        if (array_key_exists("lineItems", $arr))
        {
            $result->lineItems = array();
            foreach($arr["lineItems"] as &$value)
            {
                array_push($result->lineItems, LineItem::hydrate($value));
            }
        }
        if (array_key_exists("orderNumber", $arr))
        {
            $result->orderNumber = $arr["orderNumber"];
        }
        if (array_key_exists("cartName", $arr))
        {
            $result->cartName = $arr["cartName"];
        }
        if (array_key_exists("channel", $arr))
        {
            $result->channel = $arr["channel"];
        }
        if (array_key_exists("subChannel", $arr))
        {
            $result->subChannel = $arr["subChannel"];
        }
        if (array_key_exists("trackingNumber", $arr))
        {
            $result->trackingNumber = $arr["trackingNumber"];
        }
        return $result;
    }
    function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }
    function setSubtotal(Money $subtotal)
    {
        $this->subtotal = $subtotal;
        return $this;
    }
    function setLineItems(LineItem ... $lineItems)
    {
        $this->lineItems = $lineItems;
        return $this;
    }
    /**
     * Sets lineItems to a new value from an array.
     * @param LineItem[] $lineItems new value.
     */
    function setLineItemsFromArray(array $lineItems)
    {
        $this->lineItems = $lineItems;
        return $this;
    }
    /**
     * Adds a new element to lineItems.
     * @param LineItem $lineItems new element.
     */
    function addToLineItems(LineItem $lineItems)
    {
        if (!isset($this->lineItems))
        {
            $this->lineItems = array();
        }
        array_push($this->lineItems, $lineItems);
        return $this;
    }
    function setOrderNumber(string $orderNumber)
    {
        $this->orderNumber = $orderNumber;
        return $this;
    }
    function setCartName(string $cartName)
    {
        $this->cartName = $cartName;
        return $this;
    }
    function setChannel(?string $channel)
    {
        $this->channel = $channel;
        return $this;
    }
    function setSubChannel(?string $subChannel)
    {
        $this->subChannel = $subChannel;
        return $this;
    }
    function setTrackingNumber(?string $trackingNumber)
    {
        $this->trackingNumber = $trackingNumber;
        return $this;
    }
}
