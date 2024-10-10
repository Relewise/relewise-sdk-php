<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class RetailMediaEntity
{
    public string $typeDefinition = "";
    
    public ?string $id;
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.RetailMedia.Advertiser, Relewise.Client")
        {
            return Advertiser::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.RetailMedia.Campaign, Relewise.Client")
        {
            return Campaign::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.RetailMedia.Location, Relewise.Client")
        {
            return Location::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        if (array_key_exists("id", $arr))
        {
            $result->id = $arr["id"];
        }
        return $result;
    }
    
    function setId(?string $id)
    {
        $this->id = $id;
        return $this;
    }
}
