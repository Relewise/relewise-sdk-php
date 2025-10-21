<?php declare(strict_types=1);

namespace Relewise\Models;

class LineItemSelectedPropertiesSettings
{
    public ?SelectedProductPropertiesSettings $product;
    public ?SelectedVariantPropertiesSettings $variant;
    public bool $allData;
    public ?array $dataKeys;
    
    public static function create() : LineItemSelectedPropertiesSettings
    {
        $result = new LineItemSelectedPropertiesSettings();
        return $result;
    }
    
    public static function hydrate(array $arr) : LineItemSelectedPropertiesSettings
    {
        $result = new LineItemSelectedPropertiesSettings();
        if (array_key_exists("product", $arr))
        {
            $result->product = SelectedProductPropertiesSettings::hydrate($arr["product"]);
        }
        if (array_key_exists("variant", $arr))
        {
            $result->variant = SelectedVariantPropertiesSettings::hydrate($arr["variant"]);
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
    
    function setProduct(?SelectedProductPropertiesSettings $product)
    {
        $this->product = $product;
        return $this;
    }
    
    function setVariant(?SelectedVariantPropertiesSettings $variant)
    {
        $this->variant = $variant;
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
}
