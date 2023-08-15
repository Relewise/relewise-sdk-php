<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class VariantResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.VariantResult, Relewise.Client";
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
    /**
     * Sets variantId to a new value.
     * @param string $variantId new value.
     */
    function setVariantId(string $variantId)
    {
        $this->variantId = $variantId;
        return $this;
    }
    /**
     * Sets displayName to a new value.
     * @param string $displayName new value.
     */
    function setDisplayName(string $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    /**
     * Sets the value of a specific key in specification.
     * @param string $key index.
     * @param string $value new value.
     */
    function addToSpecification(string $key, string $value)
    {
        if (!isset($this->specification))
        {
            $this->specification = array();
        }
        $this->specification[$key] = $value;
        return $this;
    }
    /**
     * Sets specification to a new value.
     * @param array<string, string> $specification associative array.
     */
    function setSpecificationFromAssociativeArray(array $specification)
    {
        $this->specification = $specification;
        return $this;
    }
    /**
     * Sets assortments to a new value.
     * @param int[] $assortments new value.
     */
    function setAssortments(int ... $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    /**
     * Sets assortments to a new value from an array.
     * @param int[] $assortments new value.
     */
    function setAssortmentsFromArray(array $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    /**
     * Adds a new element to assortments.
     * @param int $assortments new element.
     */
    function addToAssortments(int $assortments)
    {
        if (!isset($this->assortments))
        {
            $this->assortments = array();
        }
        array_push($this->assortments, $assortments);
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
    /**
     * Sets rank to a new value.
     * @param int $rank new value.
     */
    function setRank(int $rank)
    {
        $this->rank = $rank;
        return $this;
    }
    /**
     * Sets listPrice to a new value.
     * @param ?float $listPrice new value.
     */
    function setListPrice(?float $listPrice)
    {
        $this->listPrice = $listPrice;
        return $this;
    }
    /**
     * Sets salesPrice to a new value.
     * @param ?float $salesPrice new value.
     */
    function setSalesPrice(?float $salesPrice)
    {
        $this->salesPrice = $salesPrice;
        return $this;
    }
}
