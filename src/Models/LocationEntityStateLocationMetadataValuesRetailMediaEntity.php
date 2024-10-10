<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class LocationEntityStateLocationMetadataValuesRetailMediaEntity extends RetailMediaEntity
{
    public string $typeDefinition = "";
    public LocationEntityState $state;
    /** Managed server side only, manually setting this will have no effect */
    public LocationMetadataValues $metadata;
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.RetailMedia.Location, Relewise.Client")
        {
            return Location::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = RetailMediaEntity::hydrateBase($result, $arr);
        if (array_key_exists("state", $arr))
        {
            $result->state = LocationEntityState::from($arr["state"]);
        }
        if (array_key_exists("metadata", $arr))
        {
            $result->metadata = LocationMetadataValues::hydrate($arr["metadata"]);
        }
        return $result;
    }
    
    function setState(LocationEntityState $state)
    {
        $this->state = $state;
        return $this;
    }
    
    /** Managed server side only, manually setting this will have no effect */
    function setMetadata(LocationMetadataValues $metadata)
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
