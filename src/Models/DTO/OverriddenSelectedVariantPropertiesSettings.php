<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class OverriddenSelectedVariantPropertiesSettings
{
    public ?bool $displayName;
    public ?bool $pricing;
    public ?bool $allSpecifications;
    public ?bool $assortments;
    public ?bool $allData;
    public array $dataKeys;
    public array $specificationKeys;
    public static function create() : OverriddenSelectedVariantPropertiesSettings
    {
        $result = new OverriddenSelectedVariantPropertiesSettings();
        return $result;
    }
    public static function hydrate(array $arr) : OverriddenSelectedVariantPropertiesSettings
    {
        $result = new OverriddenSelectedVariantPropertiesSettings();
        if (array_key_exists("displayName", $arr))
        {
            $result->displayName = $arr["displayName"];
        }
        if (array_key_exists("pricing", $arr))
        {
            $result->pricing = $arr["pricing"];
        }
        if (array_key_exists("allSpecifications", $arr))
        {
            $result->allSpecifications = $arr["allSpecifications"];
        }
        if (array_key_exists("assortments", $arr))
        {
            $result->assortments = $arr["assortments"];
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
        if (array_key_exists("specificationKeys", $arr))
        {
            $result->specificationKeys = array();
            foreach($arr["specificationKeys"] as &$value)
            {
                array_push($result->specificationKeys, $value);
            }
        }
        return $result;
    }
    function withDisplayName(?bool $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    function withPricing(?bool $pricing)
    {
        $this->pricing = $pricing;
        return $this;
    }
    function withAllSpecifications(?bool $allSpecifications)
    {
        $this->allSpecifications = $allSpecifications;
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
    function withDataKeys(string ... $dataKeys)
    {
        $this->dataKeys = $dataKeys;
        return $this;
    }
    function withSpecificationKeys(string ... $specificationKeys)
    {
        $this->specificationKeys = $specificationKeys;
        return $this;
    }
}
