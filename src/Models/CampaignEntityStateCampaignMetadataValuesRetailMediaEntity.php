<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class CampaignEntityStateCampaignMetadataValuesRetailMediaEntity extends RetailMediaEntity
{
    public string $typeDefinition = "";
    public CampaignEntityState $state;
    
    /** Managed server side only, manually setting this will have no effect */
    public CampaignMetadataValues $metadata;
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.RetailMedia.Campaign, Relewise.Client")
        {
            return Campaign::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = RetailMediaEntity::hydrateBase($result, $arr);
        if (array_key_exists("state", $arr))
        {
            $result->state = CampaignEntityState::from($arr["state"]);
        }
        if (array_key_exists("metadata", $arr))
        {
            $result->metadata = CampaignMetadataValues::hydrate($arr["metadata"]);
        }
        return $result;
    }
    
    function setState(CampaignEntityState $state)
    {
        $this->state = $state;
        return $this;
    }
    
    /** Managed server side only, manually setting this will have no effect */
    function setMetadata(CampaignMetadataValues $metadata)
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
