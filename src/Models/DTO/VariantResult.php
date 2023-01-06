<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class VariantResult
{
    public string $variantId;
    public string $displayName;
    public array $specification;
    public array $assortments;
    public array $data;
    public int $rank;
    public ?float $listPrice;
    public ?float $salesPrice;
    public static function create(string $variantId, int $rank) : VariantResult
    {
        $result = new VariantResult();
        $result->variantId = $variantId;
        $result->rank = $rank;
        return $result;
    }
    public static function hydrate(array $arr) : VariantResult
    {
        $result = new VariantResult();
        if (array_key_exists("variantId", $arr))
        {
            $result->variantId = $arr["variantId"];
        }
        if (array_key_exists("displayName", $arr))
        {
            $result->displayName = $arr["displayName"];
        }
        if (array_key_exists("specification", $arr))
        {
            $result->specification = array();
            foreach($arr["specification"] as $key => $value)
            {
                $result->specification[$key] = $value;
            }
        }
        if (array_key_exists("assortments", $arr))
        {
            $result->assortments = array();
            foreach($arr["assortments"] as &$value)
            {
                array_push($result->assortments, $value);
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
        if (array_key_exists("rank", $arr))
        {
            $result->rank = $arr["rank"];
        }
        if (array_key_exists("listPrice", $arr))
        {
            $result->listPrice = $arr["listPrice"];
        }
        if (array_key_exists("salesPrice", $arr))
        {
            $result->salesPrice = $arr["salesPrice"];
        }
        return $result;
    }
    function setVariantId(string $variantId)
    {
        $this->variantId = $variantId;
        return $this;
    }
    function setDisplayName(string $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    function addSpecification(string $key, string $value)
    {
        if (!isset($this->specification))
        {
            $this->specification = array();
        }
        $this->specification[$key] = $value;
        return $this;
    }
    function setAssortments(int ... $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    function addData(string $key, DataValue $value)
    {
        if (!isset($this->data))
        {
            $this->data = array();
        }
        $this->data[$key] = $value;
        return $this;
    }
    function setRank(int $rank)
    {
        $this->rank = $rank;
        return $this;
    }
    function setListPrice(?float $listPrice)
    {
        $this->listPrice = $listPrice;
        return $this;
    }
    function setSalesPrice(?float $salesPrice)
    {
        $this->salesPrice = $salesPrice;
        return $this;
    }
}
