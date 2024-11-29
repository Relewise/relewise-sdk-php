<?php declare(strict_types=1);

namespace Relewise\Models;

/** The properties to be included in highlighting. */
abstract class ProductHighlightProperties
{
    public string $typeDefinition = "";
    /** If highlights should include display name. */
    public bool $displayName;
    public array $dataKeys;
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.Shared.Highlighting.ProductHighlightProps, Relewise.Client")
        {
            return ProductHighlightProps::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        if (array_key_exists("displayName", $arr))
        {
            $result->displayName = $arr["displayName"];
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
    
    /** If highlights should include display name. */
    function setDisplayName(bool $displayName)
    {
        $this->displayName = $displayName;
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
