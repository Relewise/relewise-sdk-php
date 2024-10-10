<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

class ProductCategoryResultDetails extends ProductCategoryResultDetailsCategoryResultDetails implements JsonSerializable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ProductCategoryResultDetails, Relewise.Client";
    
    public int $purchasedFromByDifferentNumberOfUsers;
    public PurchasedByUserInfo $purchasedByUser;
    public static function create(string $categoryId) : ProductCategoryResultDetails
    {
        $result = new ProductCategoryResultDetails();
        $result->categoryId = $categoryId;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductCategoryResultDetails
    {
        $result = ProductCategoryResultDetailsCategoryResultDetails::hydrateBase(new ProductCategoryResultDetails(), $arr);
        if (array_key_exists("purchasedFromByDifferentNumberOfUsers", $arr))
        {
            $result->purchasedFromByDifferentNumberOfUsers = $arr["purchasedFromByDifferentNumberOfUsers"];
        }
        if (array_key_exists("purchasedByUser", $arr))
        {
            $result->purchasedByUser = PurchasedByUserInfo::hydrate($arr["purchasedByUser"]);
        }
        return $result;
    }
    
    function setPurchasedFromByDifferentNumberOfUsers(int $purchasedFromByDifferentNumberOfUsers)
    {
        $this->purchasedFromByDifferentNumberOfUsers = $purchasedFromByDifferentNumberOfUsers;
        return $this;
    }
    
    function setPurchasedByUser(PurchasedByUserInfo $purchasedByUser)
    {
        $this->purchasedByUser = $purchasedByUser;
        return $this;
    }
    
    function setCategoryId(string $categoryId)
    {
        $this->categoryId = $categoryId;
        return $this;
    }
    
    function setDisplayName(Multilingual $displayName)
    {
        $this->displayName = $displayName;
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
    
    function setViewedByUser(ViewedByUserInfo $viewedByUser)
    {
        $this->viewedByUser = $viewedByUser;
        return $this;
    }
    
    function setCreatedUtc(DateTime $createdUtc)
    {
        $this->createdUtc = $createdUtc;
        return $this;
    }
    
    function setLastViewedUtc(?DateTime $lastViewedUtc)
    {
        $this->lastViewedUtc = $lastViewedUtc;
        return $this;
    }
    
    function setViewedTotalNumberOfTimes(int $viewedTotalNumberOfTimes)
    {
        $this->viewedTotalNumberOfTimes = $viewedTotalNumberOfTimes;
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
    
    function setChildCategories(ProductCategoryResultDetails ... $childCategories)
    {
        $this->childCategories = $childCategories;
        return $this;
    }
    
    /** @param ProductCategoryResultDetails[] $childCategories new value. */
    function setChildCategoriesFromArray(array $childCategories)
    {
        $this->childCategories = $childCategories;
        return $this;
    }
    
    function addToChildCategories(ProductCategoryResultDetails $childCategories)
    {
        if (!isset($this->childCategories))
        {
            $this->childCategories = array();
        }
        array_push($this->childCategories, $childCategories);
        return $this;
    }
    
    function setParentCategories(ProductCategoryResultDetails ... $parentCategories)
    {
        $this->parentCategories = $parentCategories;
        return $this;
    }
    
    /** @param ProductCategoryResultDetails[] $parentCategories new value. */
    function setParentCategoriesFromArray(array $parentCategories)
    {
        $this->parentCategories = $parentCategories;
        return $this;
    }
    
    function addToParentCategories(ProductCategoryResultDetails $parentCategories)
    {
        if (!isset($this->parentCategories))
        {
            $this->parentCategories = array();
        }
        array_push($this->parentCategories, $parentCategories);
        return $this;
    }
    
    public function jsonSerialize(): mixed
    {
        $result = array();
        $result["typeDefinition"] = $this->typeDefinition;
        if (isset($this->purchasedFromByDifferentNumberOfUsers))
        {
            $result["purchasedFromByDifferentNumberOfUsers"] = $this->purchasedFromByDifferentNumberOfUsers;
        }
        if (isset($this->purchasedByUser))
        {
            $result["purchasedByUser"] = $this->purchasedByUser;
        }
        if (isset($this->categoryId))
        {
            $result["categoryId"] = $this->categoryId;
        }
        if (isset($this->displayName))
        {
            $result["displayName"] = $this->displayName;
        }
        if (isset($this->assortments))
        {
            $result["assortments"] = $this->assortments;
        }
        if (isset($this->data))
        {
            $result["data"] = $this->data;
        }
        if (isset($this->viewedByUser))
        {
            $result["viewedByUser"] = $this->viewedByUser;
        }
        if (isset($this->createdUtc))
        {
            $result["createdUtc"] = $this->createdUtc->format(DATE_ATOM);
        }
        if (isset($this->lastViewedUtc))
        {
            $result["lastViewedUtc"] = $this->lastViewedUtc->format(DATE_ATOM);
        }
        if (isset($this->viewedTotalNumberOfTimes))
        {
            $result["viewedTotalNumberOfTimes"] = $this->viewedTotalNumberOfTimes;
        }
        if (isset($this->viewedByDifferentNumberOfUsers))
        {
            $result["viewedByDifferentNumberOfUsers"] = $this->viewedByDifferentNumberOfUsers;
        }
        if (isset($this->disabled))
        {
            $result["disabled"] = $this->disabled;
        }
        if (isset($this->childCategories))
        {
            $result["childCategories"] = $this->childCategories;
        }
        if (isset($this->parentCategories))
        {
            $result["parentCategories"] = $this->parentCategories;
        }
        return $result;
    }
}
