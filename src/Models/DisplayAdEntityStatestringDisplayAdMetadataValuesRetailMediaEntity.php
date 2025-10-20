<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class DisplayAdEntityStatestringDisplayAdMetadataValuesRetailMediaEntity extends stringRetailMediaEntity
{
    public string $typeDefinition = "";
    public DisplayAdEntityState $state;
    /** Managed server side only, manually setting this will have no effect */
    public DisplayAdMetadataValues $metadata;
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.RetailMedia.Entities.DisplayAd, Relewise.Client")
        {
            return DisplayAd::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = stringRetailMediaEntity::hydrateBase($result, $arr);
        if (array_key_exists("state", $arr))
        {
            $result->state = DisplayAdEntityState::from($arr["state"]);
        }
        if (array_key_exists("metadata", $arr))
        {
            $result->metadata = DisplayAdMetadataValues::hydrate($arr["metadata"]);
        }
        return $result;
    }
    
    function setState(DisplayAdEntityState $state)
    {
        $this->state = $state;
        return $this;
    }
    
    /** Managed server side only, manually setting this will have no effect */
    function setMetadata(DisplayAdMetadataValues $metadata)
    {
        $this->metadata = $metadata;
        return $this;
    }
    
    function setId(?string $id)
    {
        $this->id = $id;
        return $this;
    }
}
