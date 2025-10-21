<?php declare(strict_types=1);

namespace Relewise\Models;

class CartDetailsSelectedPropertiesSettings
{
    public bool $allData;
    public ?array $dataKeys;
    public ?LineItemSelectedPropertiesSettings $lineItems;
    
    public static function create() : CartDetailsSelectedPropertiesSettings
    {
        $result = new CartDetailsSelectedPropertiesSettings();
        return $result;
    }
    
    public static function hydrate(array $arr) : CartDetailsSelectedPropertiesSettings
    {
        $result = new CartDetailsSelectedPropertiesSettings();
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
        if (array_key_exists("lineItems", $arr))
        {
            $result->lineItems = LineItemSelectedPropertiesSettings::hydrate($arr["lineItems"]);
        }
        return $result;
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
    
    function setLineItems(?LineItemSelectedPropertiesSettings $lineItems)
    {
        $this->lineItems = $lineItems;
        return $this;
    }
}
