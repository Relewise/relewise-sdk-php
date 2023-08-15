<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ProductResult, Relewise.Client";
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
    /**
     * Sets productId to a new value.
     * @param string $productId new value.
     */
    function setProductId(string $productId)
    {
        $this->productId = $productId;
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
     * Sets variant to a new value.
     * @param VariantResult $variant new value.
     */
    function setVariant(VariantResult $variant)
    {
        $this->variant = $variant;
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
     * Sets categoryPaths to a new value.
     * @param CategoryPathResult[] $categoryPaths new value.
     */
    function setCategoryPaths(CategoryPathResult ... $categoryPaths)
    {
        $this->categoryPaths = $categoryPaths;
        return $this;
    }
    /**
     * Sets categoryPaths to a new value from an array.
     * @param CategoryPathResult[] $categoryPaths new value.
     */
    function setCategoryPathsFromArray(array $categoryPaths)
    {
        $this->categoryPaths = $categoryPaths;
        return $this;
    }
    /**
     * Adds a new element to categoryPaths.
     * @param CategoryPathResult $categoryPaths new element.
     */
    function addToCategoryPaths(CategoryPathResult $categoryPaths)
    {
        if (!isset($this->categoryPaths))
        {
            $this->categoryPaths = array();
        }
        array_push($this->categoryPaths, $categoryPaths);
        return $this;
    }
    /**
     * Sets purchasedByUser to a new value.
     * @param PurchasedByUserInfo $purchasedByUser new value.
     */
    function setPurchasedByUser(PurchasedByUserInfo $purchasedByUser)
    {
        $this->purchasedByUser = $purchasedByUser;
        return $this;
    }
    /**
     * Sets viewedByUser to a new value.
     * @param ViewedByUserInfo $viewedByUser new value.
     */
    function setViewedByUser(ViewedByUserInfo $viewedByUser)
    {
        $this->viewedByUser = $viewedByUser;
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
    /**
     * Sets brand to a new value.
     * @param BrandResult $brand new value.
     */
    function setBrand(BrandResult $brand)
    {
        $this->brand = $brand;
        return $this;
    }
    /**
     * Sets allVariants to a new value.
     * @param VariantResult[] $allVariants new value.
     */
    function setAllVariants(VariantResult ... $allVariants)
    {
        $this->allVariants = $allVariants;
        return $this;
    }
    /**
     * Sets allVariants to a new value from an array.
     * @param VariantResult[] $allVariants new value.
     */
    function setAllVariantsFromArray(array $allVariants)
    {
        $this->allVariants = $allVariants;
        return $this;
    }
    /**
     * Adds a new element to allVariants.
     * @param VariantResult $allVariants new element.
     */
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
