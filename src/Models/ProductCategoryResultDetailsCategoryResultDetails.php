<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class ProductCategoryResultDetailsCategoryResultDetails
{
    public string $typeDefinition = "Relewise.Client.DataTypes.CategoryResultDetails`1[[Relewise.Client.DataTypes.ProductCategoryResultDetails, Relewise.Client, Version=1.61.0.0, Culture=neutral, PublicKeyToken=null]], Relewise.Client";
    public string $categoryId;
    public Multilingual $displayName;
    public array $assortments;
    public array $data;
    public ViewedByUserInfo $viewedByUser;
    public DateTime $createdUtc;
    public ?DateTime $lastViewedUtc;
    public int $viewedTotalNumberOfTimes;
    public int $viewedByDifferentNumberOfUsers;
    public bool $disabled;
    public array $childCategories;
    public array $parentCategories;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.ProductCategoryResultDetails, Relewise.Client")
        {
            return ProductCategoryResultDetails::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        if (array_key_exists("categoryId", $arr))
        {
            $result->categoryId = $arr["categoryId"];
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
        if (array_key_exists("data", $arr))
        {
            $result->data = array();
            foreach($arr["data"] as $key => $value)
            {
                $result->data[$key] = DataValue::hydrate($value);
            }
        }
        if (array_key_exists("viewedByUser", $arr))
        {
            $result->viewedByUser = ViewedByUserInfo::hydrate($arr["viewedByUser"]);
        }
        if (array_key_exists("createdUtc", $arr))
        {
            $result->createdUtc = new DateTime($arr["createdUtc"]);
        }
        if (array_key_exists("lastViewedUtc", $arr))
        {
            $result->lastViewedUtc = new DateTime($arr["lastViewedUtc"]);
        }
        if (array_key_exists("viewedTotalNumberOfTimes", $arr))
        {
            $result->viewedTotalNumberOfTimes = $arr["viewedTotalNumberOfTimes"];
        }
        if (array_key_exists("viewedByDifferentNumberOfUsers", $arr))
        {
            $result->viewedByDifferentNumberOfUsers = $arr["viewedByDifferentNumberOfUsers"];
        }
        if (array_key_exists("disabled", $arr))
        {
            $result->disabled = $arr["disabled"];
        }
        if (array_key_exists("childCategories", $arr))
        {
            $result->childCategories = array();
            foreach($arr["childCategories"] as &$value)
            {
                array_push($result->childCategories, ProductCategoryResultDetails::hydrate($value));
            }
        }
        if (array_key_exists("parentCategories", $arr))
        {
            $result->parentCategories = array();
            foreach($arr["parentCategories"] as &$value)
            {
                array_push($result->parentCategories, ProductCategoryResultDetails::hydrate($value));
            }
        }
        return $result;
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
    /**
     * Sets assortments to a new value from an array.
     * @param int[] $assortments new value.
     */
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
    /**
     * Sets data to a new value.
     * @param array<string, DataValue> $data associative array.
     */
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
    /**
     * Sets childCategories to a new value from an array.
     * @param ProductCategoryResultDetails[] $childCategories new value.
     */
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
    /**
     * Sets parentCategories to a new value from an array.
     * @param ProductCategoryResultDetails[] $parentCategories new value.
     */
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
}
