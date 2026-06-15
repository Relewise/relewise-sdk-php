<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class stringConfigurationEntity
{
    public string $typeDefinition = "";
    public ?string $id;
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Feed.FeedConfiguration, Relewise.Client")
        {
            return FeedConfiguration::hydrate($arr);
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
