<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class OverriddenSelectedProductPropertiesSettings
{
    public string $typeDefinition = "Relewise.Client.Requests.Shared.OverriddenSelectedProductPropertiesSettings, Relewise.Client";
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
    /**
     * Sets displayName to a new value.
     * @param ?bool $displayName new value.
     */
    function setDisplayName(?bool $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    /**
     * Sets categoryPaths to a new value.
     * @param ?bool $categoryPaths new value.
     */
    function setCategoryPaths(?bool $categoryPaths)
    {
        $this->categoryPaths = $categoryPaths;
        return $this;
    }
    /**
     * Sets assortments to a new value.
     * @param ?bool $assortments new value.
     */
    function setAssortments(?bool $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    /**
     * Sets pricing to a new value.
     * @param ?bool $pricing new value.
     */
    function setPricing(?bool $pricing)
    {
        $this->pricing = $pricing;
        return $this;
    }
    /**
     * Sets allData to a new value.
     * @param ?bool $allData new value.
     */
    function setAllData(?bool $allData)
    {
        $this->allData = $allData;
        return $this;
    }
    /**
     * Sets viewedByUserInfo to a new value.
     * @param ?bool $viewedByUserInfo new value.
     */
    function setViewedByUserInfo(?bool $viewedByUserInfo)
    {
        $this->viewedByUserInfo = $viewedByUserInfo;
        return $this;
    }
    /**
     * Sets purchasedByUserInfo to a new value.
     * @param ?bool $purchasedByUserInfo new value.
     */
    function setPurchasedByUserInfo(?bool $purchasedByUserInfo)
    {
        $this->purchasedByUserInfo = $purchasedByUserInfo;
        return $this;
    }
    /**
     * Sets brand to a new value.
     * @param ?bool $brand new value.
     */
    function setBrand(?bool $brand)
    {
        $this->brand = $brand;
        return $this;
    }
    /**
     * Sets allVariants to a new value.
     * @param ?bool $allVariants new value.
     */
    function setAllVariants(?bool $allVariants)
    {
        $this->allVariants = $allVariants;
        return $this;
    }
    /**
     * Sets dataKeys to a new value.
     * @param string[] $dataKeys new value.
     */
    function setDataKeys(string ... $dataKeys)
    {
        $this->dataKeys = $dataKeys;
        return $this;
    }
    /**
     * Sets dataKeys to a new value from an array.
     * @param string[] $dataKeys new value.
     */
    function setDataKeysFromArray(array $dataKeys)
    {
        $this->dataKeys = $dataKeys;
        return $this;
    }
    /**
     * Adds a new element to dataKeys.
     * @param string $dataKeys new element.
     */
    function addToDataKeys(string $dataKeys)
    {
        if (!isset($this->dataKeys))
        {
            $this->dataKeys = array();
        }
        array_push($this->dataKeys, $dataKeys);
        return $this;
    }
}
