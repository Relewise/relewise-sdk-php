<?php declare(strict_types=1);

namespace Relewise\Models;

class SelectedVariantPropertiesSettings
{
    public string $typeDefinition = "Relewise.Client.Requests.Shared.SelectedVariantPropertiesSettings, Relewise.Client";
    public bool $displayName;
    public bool $pricing;
    public bool $allSpecifications;
    public bool $assortments;
    public bool $allData;
    public ?array $dataKeys;
    public ?array $specificationKeys;
    public static function create() : SelectedVariantPropertiesSettings
    {
        $result = new SelectedVariantPropertiesSettings();
        return $result;
    }
    public static function hydrate(array $arr) : SelectedVariantPropertiesSettings
    {
        $result = new SelectedVariantPropertiesSettings();
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
    function setDisplayName(bool $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    function setPricing(bool $pricing)
    {
        $this->pricing = $pricing;
        return $this;
    }
    function setAllSpecifications(bool $allSpecifications)
    {
        $this->allSpecifications = $allSpecifications;
        return $this;
    }
    function setAssortments(bool $assortments)
    {
        $this->assortments = $assortments;
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
    function setSpecificationKeys(string ... $specificationKeys)
    {
        $this->specificationKeys = $specificationKeys;
        return $this;
    }
    /** @param ?string[] $specificationKeys new value. */
    function setSpecificationKeysFromArray(array $specificationKeys)
    {
        $this->specificationKeys = $specificationKeys;
        return $this;
    }
    function addToSpecificationKeys(string $specificationKeys)
    {
        if (!isset($this->specificationKeys))
        {
            $this->specificationKeys = array();
        }
        array_push($this->specificationKeys, $specificationKeys);
        return $this;
    }
}
