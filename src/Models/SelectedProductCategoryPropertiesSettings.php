<?php declare(strict_types=1);

namespace Relewise\Models;

class SelectedProductCategoryPropertiesSettings extends SelectedCategoryPropertiesSettings
{
    public string $typeDefinition = "Relewise.Client.Requests.Shared.SelectedProductCategoryPropertiesSettings, Relewise.Client";
    public static function create() : SelectedProductCategoryPropertiesSettings
    {
        $result = new SelectedProductCategoryPropertiesSettings();
        return $result;
    }
    public static function hydrate(array $arr) : SelectedProductCategoryPropertiesSettings
    {
        $result = SelectedCategoryPropertiesSettings::hydrateBase(new SelectedProductCategoryPropertiesSettings(), $arr);
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
    
    /** @param string[] $dataKeys new value. */
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
}
