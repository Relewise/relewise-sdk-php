<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class Cart extends Trackable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Cart, Relewise.Client";
    public ?User $user;
    public ?string $name;
    public ?Money $subtotal;
    public ?array $lineItems;
    public ?array $data;
    public static function create(?User $user, Money $subtotal) : Cart
    {
        $result = new Cart();
        $result->user = $user;
        $result->subtotal = $subtotal;
        return $result;
    }
    public static function hydrate(array $arr) : Cart
    {
        $result = Trackable::hydrateBase(new Cart(), $arr);
        if (array_key_exists("user", $arr))
        {
            $result->user = User::hydrate($arr["user"]);
        }
        if (array_key_exists("name", $arr))
        {
            $result->name = $arr["name"];
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
        if (array_key_exists("data", $arr))
        {
            $result->data = array();
            foreach($arr["data"] as $key => $value)
            {
                $result->data[$key] = DataValue::hydrate($value);
            }
        }
        return $result;
    }
    function withUser(?User $user)
    {
        $this->user = $user;
        return $this;
    }
    function withName(?string $name)
    {
        $this->name = $name;
        return $this;
    }
    function withSubtotal(?Money $subtotal)
    {
        $this->subtotal = $subtotal;
        return $this;
    }
    function withLineItems(LineItem ... $lineItems)
    {
        $this->lineItems = $lineItems;
        return $this;
    }
    function withData(string $key, DataValue $value)
    {
        if (!isset($this->data))
        {
            $this->data = array();
        }
        $this->data[$key] = $value;
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
