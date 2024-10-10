<?php declare(strict_types=1);

namespace Relewise\Models;

class Product
{
    public string $id;
    public ?Multilingual $displayName;
    public ?array $categoryPaths;
    public ?array $assortments;
    public ?array $data;
    public ?MultiCurrency $listPrice;
    public ?MultiCurrency $salesPrice;
    public ?Brand $brand;
    
    public static function create(string $id) : Product
    {
        $result = new Product();
        $result->id = $id;
        return $result;
    }
    
    public static function hydrate(array $arr) : Product
    {
        $result = new Product();
        if (array_key_exists("id", $arr))
        {
            $result->id = $arr["id"];
        }
        if (array_key_exists("displayName", $arr))
        {
            $result->displayName = Multilingual::hydrate($arr["displayName"]);
        }
        if (array_key_exists("categoryPaths", $arr))
        {
            $result->categoryPaths = array();
            foreach($arr["categoryPaths"] as &$value)
            {
                array_push($result->categoryPaths, CategoryPath::hydrate($value));
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
        if (array_key_exists("listPrice", $arr))
        {
            $result->listPrice = MultiCurrency::hydrate($arr["listPrice"]);
        }
        if (array_key_exists("salesPrice", $arr))
        {
            $result->salesPrice = MultiCurrency::hydrate($arr["salesPrice"]);
        }
        if (array_key_exists("brand", $arr))
        {
            $result->brand = Brand::hydrate($arr["brand"]);
        }
        return $result;
    }
    
    function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }
    
    function setDisplayName(?Multilingual $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    
    function setCategoryPaths(CategoryPath ... $categoryPaths)
    {
        $this->categoryPaths = $categoryPaths;
        return $this;
    }
    
    /** @param ?CategoryPath[] $categoryPaths new value. */
    function setCategoryPathsFromArray(array $categoryPaths)
    {
        $this->categoryPaths = $categoryPaths;
        return $this;
    }
    
    function addToCategoryPaths(CategoryPath $categoryPaths)
    {
        if (!isset($this->categoryPaths))
        {
            $this->categoryPaths = array();
        }
        array_push($this->categoryPaths, $categoryPaths);
        return $this;
    }
    
    function setAssortments(int ... $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    
    /** @param ?int[] $assortments new value. */
    function setAssortmentsFromArray(array $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    
    function addToAssortments(int $assortments)
    {
        if (!isset($this->assortments))
        {
            $this->assortments = array();
        }
        array_push($this->assortments, $assortments);
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
    
    /** @param ?array<string, DataValue> $data associative array. */
    function setDataFromAssociativeArray(array $data)
    {
        $this->data = $data;
        return $this;
    }
    
    function setListPrice(?MultiCurrency $listPrice)
    {
        $this->listPrice = $listPrice;
        return $this;
    }
    
    function setSalesPrice(?MultiCurrency $salesPrice)
    {
        $this->salesPrice = $salesPrice;
        return $this;
    }
    
    function setBrand(?Brand $brand)
    {
        $this->brand = $brand;
        return $this;
    }
}
