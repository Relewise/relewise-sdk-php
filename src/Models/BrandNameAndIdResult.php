<?php declare(strict_types=1);

namespace Relewise\Models;

class BrandNameAndIdResult
{
    public string $id;
    public string $displayName;
    public ?BrandResult $brand;
    
    public static function create(string $id, string $displayName) : BrandNameAndIdResult
    {
        $result = new BrandNameAndIdResult();
        $result->id = $id;
        $result->displayName = $displayName;
        return $result;
    }
    
    public static function hydrate(array $arr) : BrandNameAndIdResult
    {
        $result = new BrandNameAndIdResult();
        if (array_key_exists("id", $arr))
        {
            $result->id = $arr["id"];
        }
        if (array_key_exists("displayName", $arr))
        {
            $result->displayName = $arr["displayName"];
        }
        if (array_key_exists("brand", $arr))
        {
            $result->brand = BrandResult::hydrate($arr["brand"]);
        }
        return $result;
    }
    
    function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }
    
    function setDisplayName(string $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    
    function setBrand(?BrandResult $brand)
    {
        $this->brand = $brand;
        return $this;
    }
}
