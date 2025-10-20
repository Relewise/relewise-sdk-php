<?php declare(strict_types=1);

namespace Relewise\Models;

class SelectedDisplayAdPropertiesSettings
{
    public bool $displayName;
    public bool $allData;
    public ?array $dataKeys;
    public bool $clickedByUserInfo;
    
    public static function create() : SelectedDisplayAdPropertiesSettings
    {
        $result = new SelectedDisplayAdPropertiesSettings();
        return $result;
    }
    
    public static function hydrate(array $arr) : SelectedDisplayAdPropertiesSettings
    {
        $result = new SelectedDisplayAdPropertiesSettings();
        if (array_key_exists("displayName", $arr))
        {
            $result->displayName = $arr["displayName"];
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
        if (array_key_exists("clickedByUserInfo", $arr))
        {
            $result->clickedByUserInfo = $arr["clickedByUserInfo"];
        }
        return $result;
    }
    
    function setDisplayName(bool $displayName)
    {
        $this->displayName = $displayName;
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
    
    function setClickedByUserInfo(bool $clickedByUserInfo)
    {
        $this->clickedByUserInfo = $clickedByUserInfo;
        return $this;
    }
}
