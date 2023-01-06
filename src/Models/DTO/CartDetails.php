<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class CartDetails
{
    public string $name;
    public DateTime $modifiedUtc;
    public array $lineItems;
    public Money $subtotal;
    public array $data;
    public static function create(string $name, DateTime $modifiedUtc, array $lineItems, Money $subtotal, ... $data) : CartDetails
    {
        $result = new CartDetails();
        $result->name = $name;
        $result->modifiedUtc = $modifiedUtc;
        $result->lineItems = $lineItems;
        $result->subtotal = $subtotal;
        $result->data = $data;
        return $result;
    }
    public static function hydrate(array $arr) : CartDetails
    {
        $result = new CartDetails();
        if (array_key_exists("name", $arr))
        {
            $result->name = $arr["name"];
        }
        if (array_key_exists("modifiedUtc", $arr))
        {
            $result->modifiedUtc = $arr["modifiedUtc"];
        }
        if (array_key_exists("lineItems", $arr))
        {
            $result->lineItems = array();
            foreach($arr["lineItems"] as &$value)
            {
                array_push($result->lineItems, LineItem::hydrate($value));
            }
        }
        if (array_key_exists("subtotal", $arr))
        {
            $result->subtotal = Money::hydrate($arr["subtotal"]);
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
    function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }
    function setModifiedUtc(DateTime $modifiedUtc)
    {
        $this->modifiedUtc = $modifiedUtc;
        return $this;
    }
    function setLineItems(LineItem ... $lineItems)
    {
        $this->lineItems = $lineItems;
        return $this;
    }
    function addToLineItems(LineItem $lineItems)
    {
        if (!isset($this->lineItems))
        {
            $this->lineItems = array();
        }
        array_push($this->lineItems, $lineItems);
        return $this;
    }
    function setSubtotal(Money $subtotal)
    {
        $this->subtotal = $subtotal;
        return $this;
    }
    function addToData(string $key, DataValue $value)
    {
        if (!isset($this->data))
        {
            $this->data = array();
        }
        $this->data[$key] = $value;
        return $this;
    }
}
