<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductVariant
{
    public string $id;
    public ?Multilingual $displayName;
    public ?array $assortments;
    public ?array $specification;
    public ?array $data;
    public ?array $custom;
    public ?MultiCurrency $listPrice;
    public ?MultiCurrency $salesPrice;
    public static function create() : ProductVariant
    {
        $result = new ProductVariant();
        return $result;
    }
    public static function hydrate(array $arr) : ProductVariant
    {
        $result = new ProductVariant();
        if (array_key_exists("id", $arr))
        {
            $result->id = $arr["id"];
        }
        if (array_key_exists("displayName", $arr))
        {
            $result->displayName = Multilingual::hydrate($arr["displayName"]);
        }
        if (array_key_exists("assortments", $arr))
        {
            $result->assortments = array();
            foreach($arr["assortments"] as &$value)
            {
                array_push($result->assortments, $value);
            }
        }
        if (array_key_exists("specification", $arr))
        {
            $result->specification = array();
            foreach($arr["specification"] as $key => $value)
            {
                $result->specification[$key] = $value;
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
        if (array_key_exists("custom", $arr))
        {
            $result->custom = array();
            foreach($arr["custom"] as $key => $value)
            {
                $result->custom[$key] = $value;
            }
        }
        if (array_key_exists("listPrice", $arr))
        {
            $result->listPrice = MultiCurrency::hydrate($arr["listPrice"]);
        }
        if (array_key_exists("salesPrice", $arr))
        {
            $result->salesPrice = MultiCurrency::hydrate($arr["salesPrice"]);
        }
        return $result;
    }
    function withId(string $id)
    {
        $this->id = $id;
        return $this;
    }
    function withDisplayName(?Multilingual $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    function withAssortments(int ... $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    function withSpecification(string $key, string $value)
    {
        if (!isset($this->specification))
        {
            $this->specification = array();
        }
        $this->specification[$key] = $value;
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
    function withListPrice(?MultiCurrency $listPrice)
    {
        $this->listPrice = $listPrice;
        return $this;
    }
    function withSalesPrice(?MultiCurrency $salesPrice)
    {
        $this->salesPrice = $salesPrice;
        return $this;
    }
}
