<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductResult
{
    public string $productId;
    public string $displayName;
    public VariantResult $variant;
    public int $rank;
    public array $assortments;
    public array $data;
    public array $categoryPaths;
    public PurchasedByUserInfo $purchasedByUser;
    public ViewedByUserInfo $viewedByUser;
    public ?float $listPrice;
    public ?float $salesPrice;
    public BrandResult $brand;
    public array $allVariants;
    public static function create(string $productId, int $rank) : ProductResult
    {
        $result = new ProductResult();
        $result->productId = $productId;
        $result->rank = $rank;
        return $result;
    }
    public static function hydrate(array $arr) : ProductResult
    {
        $result = new ProductResult();
        if (array_key_exists("productId", $arr))
        {
            $result->productId = $arr["productId"];
        }
        if (array_key_exists("displayName", $arr))
        {
            $result->displayName = $arr["displayName"];
        }
        if (array_key_exists("variant", $arr))
        {
            $result->variant = VariantResult::hydrate($arr["variant"]);
        }
        if (array_key_exists("rank", $arr))
        {
            $result->rank = $arr["rank"];
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
        if (array_key_exists("categoryPaths", $arr))
        {
            $result->categoryPaths = array();
            foreach($arr["categoryPaths"] as &$value)
            {
                array_push($result->categoryPaths, CategoryPathResult::hydrate($value));
            }
        }
        if (array_key_exists("purchasedByUser", $arr))
        {
            $result->purchasedByUser = PurchasedByUserInfo::hydrate($arr["purchasedByUser"]);
        }
        if (array_key_exists("viewedByUser", $arr))
        {
            $result->viewedByUser = ViewedByUserInfo::hydrate($arr["viewedByUser"]);
        }
        if (array_key_exists("listPrice", $arr))
        {
            $result->listPrice = $arr["listPrice"];
        }
        if (array_key_exists("salesPrice", $arr))
        {
            $result->salesPrice = $arr["salesPrice"];
        }
        if (array_key_exists("brand", $arr))
        {
            $result->brand = BrandResult::hydrate($arr["brand"]);
        }
        if (array_key_exists("allVariants", $arr))
        {
            $result->allVariants = array();
            foreach($arr["allVariants"] as &$value)
            {
                array_push($result->allVariants, VariantResult::hydrate($value));
            }
        }
        return $result;
    }
    function setProductId(string $productId)
    {
        $this->productId = $productId;
        return $this;
    }
    function setDisplayName(string $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    function setVariant(VariantResult $variant)
    {
        $this->variant = $variant;
        return $this;
    }
    function setRank(int $rank)
    {
        $this->rank = $rank;
        return $this;
    }
    function setAssortments(int ... $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
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
    function setDataFromAssociativeArray(array $data)
    {
        $this->data = $data;
        return $this;
    }
    function setCategoryPaths(CategoryPathResult ... $categoryPaths)
    {
        $this->categoryPaths = $categoryPaths;
        return $this;
    }
    function setCategoryPathsFromArray(array $categoryPaths)
    {
        $this->categoryPaths = $categoryPaths;
        return $this;
    }
    function addToCategoryPaths(CategoryPathResult $categoryPaths)
    {
        if (!isset($this->categoryPaths))
        {
            $this->categoryPaths = array();
        }
        array_push($this->categoryPaths, $categoryPaths);
        return $this;
    }
    function setPurchasedByUser(PurchasedByUserInfo $purchasedByUser)
    {
        $this->purchasedByUser = $purchasedByUser;
        return $this;
    }
    function setViewedByUser(ViewedByUserInfo $viewedByUser)
    {
        $this->viewedByUser = $viewedByUser;
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
    function setBrand(BrandResult $brand)
    {
        $this->brand = $brand;
        return $this;
    }
    function setAllVariants(VariantResult ... $allVariants)
    {
        $this->allVariants = $allVariants;
        return $this;
    }
    function setAllVariantsFromArray(array $allVariants)
    {
        $this->allVariants = $allVariants;
        return $this;
    }
    function addToAllVariants(VariantResult $allVariants)
    {
        if (!isset($this->allVariants))
        {
            $this->allVariants = array();
        }
        array_push($this->allVariants, $allVariants);
        return $this;
    }
}
