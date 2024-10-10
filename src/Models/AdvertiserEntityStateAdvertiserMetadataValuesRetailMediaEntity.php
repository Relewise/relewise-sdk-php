<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class AdvertiserEntityStateAdvertiserMetadataValuesRetailMediaEntity extends RetailMediaEntity
{
    public string $typeDefinition = "";
    public AdvertiserEntityState $state;
    /** Managed server side only, manually setting this will have no effect */
    public AdvertiserMetadataValues $metadata;
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.RetailMedia.Advertiser, Relewise.Client")
        {
            return Advertiser::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = RetailMediaEntity::hydrateBase($result, $arr);
        if (array_key_exists("state", $arr))
        {
            $result->state = AdvertiserEntityState::from($arr["state"]);
        }
        if (array_key_exists("metadata", $arr))
        {
            $result->metadata = AdvertiserMetadataValues::hydrate($arr["metadata"]);
        }
        return $result;
    }
    
    function setState(AdvertiserEntityState $state)
    {
        $this->state = $state;
        return $this;
    }
    
    /** Managed server side only, manually setting this will have no effect */
    function setMetadata(AdvertiserMetadataValues $metadata)
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
