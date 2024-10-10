<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class Promotion
{
    public string $typeDefinition = "";
    public string $name;
    public ?PromotionLocationCollection $locations;
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.RetailMedia.ProductPromotion, Relewise.Client")
        {
            return ProductPromotion::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        if (array_key_exists("name", $arr))
        {
            $result->name = $arr["name"];
        }
        if (array_key_exists("locations", $arr))
        {
            $result->locations = PromotionLocationCollection::hydrate($arr["locations"]);
        }
        return $result;
    }
    
    function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }
    
    function setLocations(?PromotionLocationCollection $locations)
    {
        $this->locations = $locations;
        return $this;
    }
}
