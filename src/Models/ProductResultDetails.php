<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

class ProductResultDetails implements JsonSerializable
{
    public string $productId;
    public Multilingual $displayName;
    /** @deprecated Not in use, this will always be null */
    public VariantResult $variant;
    public array $assortments;
    public array $data;
    public array $categoryPaths;
    public PurchasedByUserInfo $purchasedByUser;
    public ViewedByUserInfo $viewedByUser;
    public array $allVariants;
    public DateTime $createdUtc;
    public ?DateTime $lastPurchasedUtc;
    public ?DateTime $lastViewedUtc;
    public int $containedInTotalNumberOfOrders;
    public int $viewedTotalNumberOfTimes;
    public int $purchasedByDifferentNumberOfUsers;
    public int $viewedByDifferentNumberOfUsers;
    public bool $disabled;
    public bool $deleted;
    public MultiCurrency $listPrice;
    public MultiCurrency $salesPrice;
    public BrandResultDetails $brand;
    public array $filteredVariants;
    public static function create(string $productId) : ProductResultDetails
    {
        $result = new ProductResultDetails();
        $result->productId = $productId;
        return $result;
    }
    public static function hydrate(array $arr) : ProductResultDetails
    {
        $result = new ProductResultDetails();
        if (array_key_exists("productId", $arr))
        {
            $result->productId = $arr["productId"];
        }
        if (array_key_exists("displayName", $arr))
        {
            $result->displayName = Multilingual::hydrate($arr["displayName"]);
        }
        if (array_key_exists("variant", $arr))
        {
            $result->variant = VariantResult::hydrate($arr["variant"]);
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
                array_push($result->categoryPaths, CategoryPathResultDetails::hydrate($value));
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
        if (array_key_exists("allVariants", $arr))
        {
            $result->allVariants = array();
            foreach($arr["allVariants"] as &$value)
            {
                array_push($result->allVariants, VariantResultDetails::hydrate($value));
            }
        }
        if (array_key_exists("createdUtc", $arr))
        {
            $result->createdUtc = new DateTime($arr["createdUtc"]);
        }
        if (array_key_exists("lastPurchasedUtc", $arr))
        {
            $result->lastPurchasedUtc = new DateTime($arr["lastPurchasedUtc"]);
        }
        if (array_key_exists("lastViewedUtc", $arr))
        {
            $result->lastViewedUtc = new DateTime($arr["lastViewedUtc"]);
        }
        if (array_key_exists("containedInTotalNumberOfOrders", $arr))
        {
            $result->containedInTotalNumberOfOrders = $arr["containedInTotalNumberOfOrders"];
        }
        if (array_key_exists("viewedTotalNumberOfTimes", $arr))
        {
            $result->viewedTotalNumberOfTimes = $arr["viewedTotalNumberOfTimes"];
        }
        if (array_key_exists("purchasedByDifferentNumberOfUsers", $arr))
        {
            $result->purchasedByDifferentNumberOfUsers = $arr["purchasedByDifferentNumberOfUsers"];
        }
        if (array_key_exists("viewedByDifferentNumberOfUsers", $arr))
        {
            $result->viewedByDifferentNumberOfUsers = $arr["viewedByDifferentNumberOfUsers"];
        }
        if (array_key_exists("disabled", $arr))
        {
            $result->disabled = $arr["disabled"];
        }
        if (array_key_exists("deleted", $arr))
        {
            $result->deleted = $arr["deleted"];
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
            $result->brand = BrandResultDetails::hydrate($arr["brand"]);
        }
        if (array_key_exists("filteredVariants", $arr))
        {
            $result->filteredVariants = array();
            foreach($arr["filteredVariants"] as &$value)
            {
                array_push($result->filteredVariants, VariantResultDetails::hydrate($value));
            }
        }
        return $result;
    }
    
    function setProductId(string $productId)
    {
        $this->productId = $productId;
        return $this;
    }
    
    function setDisplayName(Multilingual $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    
    /** @deprecated Not in use, this will always be null */
    function setVariant(VariantResult $variant)
    {
        $this->variant = $variant;
        return $this;
    }
    
    function setAssortments(int ... $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    
    /** @param int[] $assortments new value. */
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
    
    /** @param array<string, DataValue> $data associative array. */
    function setDataFromAssociativeArray(array $data)
    {
        $this->data = $data;
        return $this;
    }
    
    function setCategoryPaths(CategoryPathResultDetails ... $categoryPaths)
    {
        $this->categoryPaths = $categoryPaths;
        return $this;
    }
    
    /** @param CategoryPathResultDetails[] $categoryPaths new value. */
    function setCategoryPathsFromArray(array $categoryPaths)
    {
        $this->categoryPaths = $categoryPaths;
        return $this;
    }
    
    function addToCategoryPaths(CategoryPathResultDetails $categoryPaths)
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
    
    function setAllVariants(VariantResultDetails ... $allVariants)
    {
        $this->allVariants = $allVariants;
        return $this;
    }
    
    /** @param VariantResultDetails[] $allVariants new value. */
    function setAllVariantsFromArray(array $allVariants)
    {
        $this->allVariants = $allVariants;
        return $this;
    }
    
    function addToAllVariants(VariantResultDetails $allVariants)
    {
        if (!isset($this->allVariants))
        {
            $this->allVariants = array();
        }
        array_push($this->allVariants, $allVariants);
        return $this;
    }
    
    function setCreatedUtc(DateTime $createdUtc)
    {
        $this->createdUtc = $createdUtc;
        return $this;
    }
    
    function setLastPurchasedUtc(?DateTime $lastPurchasedUtc)
    {
        $this->lastPurchasedUtc = $lastPurchasedUtc;
        return $this;
    }
    
    function setLastViewedUtc(?DateTime $lastViewedUtc)
    {
        $this->lastViewedUtc = $lastViewedUtc;
        return $this;
    }
    
    function setContainedInTotalNumberOfOrders(int $containedInTotalNumberOfOrders)
    {
        $this->containedInTotalNumberOfOrders = $containedInTotalNumberOfOrders;
        return $this;
    }
    
    function setViewedTotalNumberOfTimes(int $viewedTotalNumberOfTimes)
    {
        $this->viewedTotalNumberOfTimes = $viewedTotalNumberOfTimes;
        return $this;
    }
    
    function setPurchasedByDifferentNumberOfUsers(int $purchasedByDifferentNumberOfUsers)
    {
        $this->purchasedByDifferentNumberOfUsers = $purchasedByDifferentNumberOfUsers;
        return $this;
    }
    
    function setViewedByDifferentNumberOfUsers(int $viewedByDifferentNumberOfUsers)
    {
        $this->viewedByDifferentNumberOfUsers = $viewedByDifferentNumberOfUsers;
        return $this;
    }
    
    function setDisabled(bool $disabled)
    {
        $this->disabled = $disabled;
        return $this;
    }
    
    function setDeleted(bool $deleted)
    {
        $this->deleted = $deleted;
        return $this;
    }
    
    function setListPrice(MultiCurrency $listPrice)
    {
        $this->listPrice = $listPrice;
        return $this;
    }
    
    function setSalesPrice(MultiCurrency $salesPrice)
    {
        $this->salesPrice = $salesPrice;
        return $this;
    }
    
    function setBrand(BrandResultDetails $brand)
    {
        $this->brand = $brand;
        return $this;
    }
    
    function setFilteredVariants(VariantResultDetails ... $filteredVariants)
    {
        $this->filteredVariants = $filteredVariants;
        return $this;
    }
    
    /** @param VariantResultDetails[] $filteredVariants new value. */
    function setFilteredVariantsFromArray(array $filteredVariants)
    {
        $this->filteredVariants = $filteredVariants;
        return $this;
    }
    
    function addToFilteredVariants(VariantResultDetails $filteredVariants)
    {
        if (!isset($this->filteredVariants))
        {
            $this->filteredVariants = array();
        }
        array_push($this->filteredVariants, $filteredVariants);
        return $this;
    }
    
    public function jsonSerialize(): mixed
    {
        $result = array();
        if (isset($this->productId))
        {
            $result["productId"] = $this->productId;
        }
        if (isset($this->displayName))
        {
            $result["displayName"] = $this->displayName;
        }
        if (isset($this->variant))
        {
            $result["variant"] = $this->variant;
        }
        if (isset($this->assortments))
        {
            $result["assortments"] = $this->assortments;
        }
        if (isset($this->data))
        {
            $result["data"] = $this->data;
        }
        if (isset($this->categoryPaths))
        {
            $result["categoryPaths"] = $this->categoryPaths;
        }
        if (isset($this->purchasedByUser))
        {
            $result["purchasedByUser"] = $this->purchasedByUser;
        }
        if (isset($this->viewedByUser))
        {
            $result["viewedByUser"] = $this->viewedByUser;
        }
        if (isset($this->allVariants))
        {
            $result["allVariants"] = $this->allVariants;
        }
        if (isset($this->createdUtc))
        {
            $result["createdUtc"] = $this->createdUtc->format(DATE_ATOM);
        }
        if (isset($this->lastPurchasedUtc))
        {
            $result["lastPurchasedUtc"] = $this->lastPurchasedUtc->format(DATE_ATOM);
        }
        if (isset($this->lastViewedUtc))
        {
            $result["lastViewedUtc"] = $this->lastViewedUtc->format(DATE_ATOM);
        }
        if (isset($this->containedInTotalNumberOfOrders))
        {
            $result["containedInTotalNumberOfOrders"] = $this->containedInTotalNumberOfOrders;
        }
        if (isset($this->viewedTotalNumberOfTimes))
        {
            $result["viewedTotalNumberOfTimes"] = $this->viewedTotalNumberOfTimes;
        }
        if (isset($this->purchasedByDifferentNumberOfUsers))
        {
            $result["purchasedByDifferentNumberOfUsers"] = $this->purchasedByDifferentNumberOfUsers;
        }
        if (isset($this->viewedByDifferentNumberOfUsers))
        {
            $result["viewedByDifferentNumberOfUsers"] = $this->viewedByDifferentNumberOfUsers;
        }
        if (isset($this->disabled))
        {
            $result["disabled"] = $this->disabled;
        }
        if (isset($this->deleted))
        {
            $result["deleted"] = $this->deleted;
        }
        if (isset($this->listPrice))
        {
            $result["listPrice"] = $this->listPrice;
        }
        if (isset($this->salesPrice))
        {
            $result["salesPrice"] = $this->salesPrice;
        }
        if (isset($this->brand))
        {
            $result["brand"] = $this->brand;
        }
        if (isset($this->filteredVariants))
        {
            $result["filteredVariants"] = $this->filteredVariants;
        }
        return $result;
    }
}
