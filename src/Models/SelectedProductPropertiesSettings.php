<?php declare(strict_types=1);

namespace Relewise\Models;

class SelectedProductPropertiesSettings
{
    public bool $displayName;
    public bool $categoryPaths;
    public bool $assortments;
    public bool $pricing;
    public bool $allData;
    public bool $viewedByUserInfo;
    public bool $purchasedByUserInfo;
    public bool $brand;
    public bool $allVariants;
    public ?array $dataKeys;
    public bool $viewedByUserCompanyInfo;
    public bool $purchasedByUserCompanyInfo;
    public ?FilteredVariantsSettings $filteredVariants;
    public static function create() : SelectedProductPropertiesSettings
    {
        $result = new SelectedProductPropertiesSettings();
        return $result;
    }
    
    public static function hydrate(array $arr) : SelectedProductPropertiesSettings
    {
        $result = new SelectedProductPropertiesSettings();
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
        if (array_key_exists("viewedByUserCompanyInfo", $arr))
        {
            $result->viewedByUserCompanyInfo = $arr["viewedByUserCompanyInfo"];
        }
        if (array_key_exists("purchasedByUserCompanyInfo", $arr))
        {
            $result->purchasedByUserCompanyInfo = $arr["purchasedByUserCompanyInfo"];
        }
        if (array_key_exists("filteredVariants", $arr))
        {
            $result->filteredVariants = FilteredVariantsSettings::hydrate($arr["filteredVariants"]);
        }
        return $result;
    }
    
    function setDisplayName(bool $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    
    function setCategoryPaths(bool $categoryPaths)
    {
        $this->categoryPaths = $categoryPaths;
        return $this;
    }
    
    function setAssortments(bool $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    
    function setPricing(bool $pricing)
    {
        $this->pricing = $pricing;
        return $this;
    }
    
    function setAllData(bool $allData)
    {
        $this->allData = $allData;
        return $this;
    }
    
    function setViewedByUserInfo(bool $viewedByUserInfo)
    {
        $this->viewedByUserInfo = $viewedByUserInfo;
        return $this;
    }
    
    function setPurchasedByUserInfo(bool $purchasedByUserInfo)
    {
        $this->purchasedByUserInfo = $purchasedByUserInfo;
        return $this;
    }
    
    function setBrand(bool $brand)
    {
        $this->brand = $brand;
        return $this;
    }
    
    function setAllVariants(bool $allVariants)
    {
        $this->allVariants = $allVariants;
        return $this;
    }
    
    function setDataKeys(string ... $dataKeys)
    {
        $this->dataKeys = $dataKeys;
        return $this;
    }
    
    /** @param ?string[] $dataKeys new value. */
    function setDataKeysFromArray(array $dataKeys)
    {
        $this->dataKeys = $dataKeys;
        return $this;
    }
    
    function addToDataKeys(string $dataKeys)
    {
        if (!isset($this->dataKeys))
        {
            $this->dataKeys = array();
        }
        array_push($this->dataKeys, $dataKeys);
        return $this;
    }
    
    function setViewedByUserCompanyInfo(bool $viewedByUserCompanyInfo)
    {
        $this->viewedByUserCompanyInfo = $viewedByUserCompanyInfo;
        return $this;
    }
    
    function setPurchasedByUserCompanyInfo(bool $purchasedByUserCompanyInfo)
    {
        $this->purchasedByUserCompanyInfo = $purchasedByUserCompanyInfo;
        return $this;
    }
    
    function setFilteredVariants(?FilteredVariantsSettings $filteredVariants)
    {
        $this->filteredVariants = $filteredVariants;
        return $this;
    }
}
