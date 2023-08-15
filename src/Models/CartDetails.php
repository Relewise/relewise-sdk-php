<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class CartDetails
{
    public string $typeDefinition = "Relewise.Client.DataTypes.CartDetails, Relewise.Client";
    public string $name;
    public DateTime $modifiedUtc;
    public array $lineItems;
    public Money $subtotal;
    public array $data;
    public static function create(string $name, DateTime $modifiedUtc, array $lineItems, Money $subtotal, array $data) : CartDetails
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
            $result->modifiedUtc = new DateTime($arr["modifiedUtc"]);
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
    /**
     * Sets name to a new value.
     * @param string $name new value.
     */
    function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }
    /**
     * Sets modifiedUtc to a new value.
     * @param DateTime $modifiedUtc new value.
     */
    function setModifiedUtc(DateTime $modifiedUtc)
    {
        $this->modifiedUtc = $modifiedUtc;
        return $this;
    }
    /**
     * Sets lineItems to a new value.
     * @param LineItem[] $lineItems new value.
     */
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
    /**
     * Sets subtotal to a new value.
     * @param Money $subtotal new value.
     */
    function setSubtotal(Money $subtotal)
    {
        $this->subtotal = $subtotal;
        return $this;
    }
    /**
     * Sets the value of a specific key in data.
     * @param string $key index.
     * @param DataValue $value new value.
     */
    function addToData(string $key, DataValue $value)
    {
        if (!isset($this->data))
        {
            $this->data = array();
        }
        $this->data[$key] = $value;
        return $this;
    }
    /**
     * Sets data to a new value.
     * @param array<string, DataValue> $data associative array.
     */
    function setDataFromAssociativeArray(array $data)
    {
        $this->data = $data;
        return $this;
    }
}
