<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class OverriddenSelectedProductPropertiesSettings
{
    public ?bool $displayName;
    public ?bool $categoryPaths;
    public ?bool $assortments;
    public ?bool $pricing;
    public ?bool $allData;
    public ?bool $viewedByUserInfo;
    public ?bool $purchasedByUserInfo;
    public ?bool $brand;
    public ?bool $allVariants;
    public array $dataKeys;
    public static function create() : OverriddenSelectedProductPropertiesSettings
    {
        $result = new OverriddenSelectedProductPropertiesSettings();
        return $result;
    }
    public static function hydrate(array $arr) : OverriddenSelectedProductPropertiesSettings
    {
        $result = new OverriddenSelectedProductPropertiesSettings();
        if (array_key_exists("displayName", $arr))
        {
            $result->displayName = $arr["displayName"];
        }
        if (array_key_exists("categoryPaths", $arr))
        {
            $result->categoryPaths = $arr["categoryPaths"];
        }
        if (array_key_exists("assortments", $arr))
        {
            $result->assortments = $arr["assortments"];
        }
        if (array_key_exists("pricing", $arr))
        {
            $result->pricing = $arr["pricing"];
        }
        if (array_key_exists("allData", $arr))
        {
            $result->allData = $arr["allData"];
        }
        if (array_key_exists("viewedByUserInfo", $arr))
        {
            $result->viewedByUserInfo = $arr["viewedByUserInfo"];
        }
        if (array_key_exists("purchasedByUserInfo", $arr))
        {
            $result->purchasedByUserInfo = $arr["purchasedByUserInfo"];
        }
        if (array_key_exists("brand", $arr))
        {
            $result->brand = $arr["brand"];
        }
        if (array_key_exists("allVariants", $arr))
        {
            $result->allVariants = $arr["allVariants"];
        }
        if (array_key_exists("dataKeys", $arr))
        {
            $result->dataKeys = array();
            foreach($arr["dataKeys"] as &$value)
            {
                array_push($result->dataKeys, $value);
            }
        }
        return $result;
    }
    function setDisplayName(?bool $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    function setCategoryPaths(?bool $categoryPaths)
    {
        $this->categoryPaths = $categoryPaths;
        return $this;
    }
    function setAssortments(?bool $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    function setPricing(?bool $pricing)
    {
        $this->pricing = $pricing;
        return $this;
    }
    function setAllData(?bool $allData)
    {
        $this->allData = $allData;
        return $this;
    }
    function setViewedByUserInfo(?bool $viewedByUserInfo)
    {
        $this->viewedByUserInfo = $viewedByUserInfo;
        return $this;
    }
    function setPurchasedByUserInfo(?bool $purchasedByUserInfo)
    {
        $this->purchasedByUserInfo = $purchasedByUserInfo;
        return $this;
    }
    function setBrand(?bool $brand)
    {
        $this->brand = $brand;
        return $this;
    }
    function setAllVariants(?bool $allVariants)
    {
        $this->allVariants = $allVariants;
        return $this;
    }
    function setDataKeys(string ... $dataKeys)
    {
        $this->dataKeys = $dataKeys;
        return $this;
    }
}
