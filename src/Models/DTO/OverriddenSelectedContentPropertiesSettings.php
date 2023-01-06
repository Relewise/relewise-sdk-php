<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class OverriddenSelectedContentPropertiesSettings
{
    public ?bool $displayName;
    public ?bool $categoryPaths;
    public ?bool $assortments;
    public ?bool $allData;
    public ?bool $viewedByUserInfo;
    public array $dataKeys;
    public static function create() : OverriddenSelectedContentPropertiesSettings
    {
        $result = new OverriddenSelectedContentPropertiesSettings();
        return $result;
    }
    public static function hydrate(array $arr) : OverriddenSelectedContentPropertiesSettings
    {
        $result = new OverriddenSelectedContentPropertiesSettings();
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
        if (array_key_exists("allData", $arr))
        {
            $result->allData = $arr["allData"];
        }
        if (array_key_exists("viewedByUserInfo", $arr))
        {
            $result->viewedByUserInfo = $arr["viewedByUserInfo"];
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
    function withDisplayName(?bool $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    function withCategoryPaths(?bool $categoryPaths)
    {
        $this->categoryPaths = $categoryPaths;
        return $this;
    }
    function withAssortments(?bool $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    function withAllData(?bool $allData)
    {
        $this->allData = $allData;
        return $this;
    }
    function withViewedByUserInfo(?bool $viewedByUserInfo)
    {
        $this->viewedByUserInfo = $viewedByUserInfo;
        return $this;
    }
    function withDataKeys(string ... $dataKeys)
    {
        $this->dataKeys = $dataKeys;
        return $this;
    }
}
