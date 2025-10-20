<?php declare(strict_types=1);

namespace Relewise\Models;

class UserResultDetailsSelectedPropertiesSettings
{
    public bool $allClassifications;
    public ?array $classificationKeys;
    public ?CartDetailsSelectedPropertiesSettings $carts;
    public bool $allIdentifiers;
    public ?array $identifierKeys;
    public bool $allData;
    public ?array $dataKeys;
    
    public static function create() : UserResultDetailsSelectedPropertiesSettings
    {
        $result = new UserResultDetailsSelectedPropertiesSettings();
        return $result;
    }
    
    public static function hydrate(array $arr) : UserResultDetailsSelectedPropertiesSettings
    {
        $result = new UserResultDetailsSelectedPropertiesSettings();
        if (array_key_exists("allClassifications", $arr))
        {
            $result->allClassifications = $arr["allClassifications"];
        }
        if (array_key_exists("classificationKeys", $arr))
        {
            $result->classificationKeys = array();
            foreach($arr["classificationKeys"] as &$value)
            {
                array_push($result->classificationKeys, $value);
            }
        }
        if (array_key_exists("carts", $arr))
        {
            $result->carts = CartDetailsSelectedPropertiesSettings::hydrate($arr["carts"]);
        }
        if (array_key_exists("allIdentifiers", $arr))
        {
            $result->allIdentifiers = $arr["allIdentifiers"];
        }
        if (array_key_exists("identifierKeys", $arr))
        {
            $result->identifierKeys = array();
            foreach($arr["identifierKeys"] as &$value)
            {
                array_push($result->identifierKeys, $value);
            }
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
    
    function setAllClassifications(bool $allClassifications)
    {
        $this->allClassifications = $allClassifications;
        return $this;
    }
    
    function setClassificationKeys(string ... $classificationKeys)
    {
        $this->classificationKeys = $classificationKeys;
        return $this;
    }
    
    /** @param ?string[] $classificationKeys new value. */
    function setClassificationKeysFromArray(array $classificationKeys)
    {
        $this->classificationKeys = $classificationKeys;
        return $this;
    }
    
    function addToClassificationKeys(string $classificationKeys)
    {
        if (!isset($this->classificationKeys))
        {
            $this->classificationKeys = array();
        }
        array_push($this->classificationKeys, $classificationKeys);
        return $this;
    }
    
    function setCarts(?CartDetailsSelectedPropertiesSettings $carts)
    {
        $this->carts = $carts;
        return $this;
    }
    
    function setAllIdentifiers(bool $allIdentifiers)
    {
        $this->allIdentifiers = $allIdentifiers;
        return $this;
    }
    
    function setIdentifierKeys(string ... $identifierKeys)
    {
        $this->identifierKeys = $identifierKeys;
        return $this;
    }
    
    /** @param ?string[] $identifierKeys new value. */
    function setIdentifierKeysFromArray(array $identifierKeys)
    {
        $this->identifierKeys = $identifierKeys;
        return $this;
    }
    
    function addToIdentifierKeys(string $identifierKeys)
    {
        if (!isset($this->identifierKeys))
        {
            $this->identifierKeys = array();
        }
        array_push($this->identifierKeys, $identifierKeys);
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
