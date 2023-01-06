<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class SelectedProductCategoryPropertiesSettings
{
    public bool $displayName;
    public bool $paths;
    public bool $assortments;
    public bool $viewedByUserInfo;
    public bool $allData;
    public array $dataKeys;
    public static function create() : SelectedProductCategoryPropertiesSettings
    {
        $result = new SelectedProductCategoryPropertiesSettings();
        return $result;
    }
    public static function hydrate(array $arr) : SelectedProductCategoryPropertiesSettings
    {
        $result = new SelectedProductCategoryPropertiesSettings();
        if (array_key_exists("displayName", $arr))
        {
            $result->displayName = $arr["displayName"];
        }
        if (array_key_exists("paths", $arr))
        {
            $result->paths = $arr["paths"];
        }
        if (array_key_exists("assortments", $arr))
        {
            $result->assortments = $arr["assortments"];
        }
        if (array_key_exists("viewedByUserInfo", $arr))
        {
            $result->viewedByUserInfo = $arr["viewedByUserInfo"];
        }
        if (array_key_exists("allData", $arr))
        {
            $result->allData = $arr["allData"];
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
    function setDisplayName(bool $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    function setPaths(bool $paths)
    {
        $this->paths = $paths;
        return $this;
    }
    function setAssortments(bool $assortments)
    {
        $this->assortments = $assortments;
        return $this;
    }
    function setViewedByUserInfo(bool $viewedByUserInfo)
    {
        $this->viewedByUserInfo = $viewedByUserInfo;
        return $this;
    }
    function setAllData(bool $allData)
    {
        $this->allData = $allData;
        return $this;
    }
    function setDataKeys(string ... $dataKeys)
    {
        $this->dataKeys = $dataKeys;
        return $this;
    }
}
