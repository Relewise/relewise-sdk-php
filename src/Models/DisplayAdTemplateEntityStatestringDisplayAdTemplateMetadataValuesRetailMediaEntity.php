<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class DisplayAdTemplateEntityStatestringDisplayAdTemplateMetadataValuesRetailMediaEntity extends stringRetailMediaEntity
{
    public string $typeDefinition = "";
    public DisplayAdTemplateEntityState $state;
    /** Managed server side only, manually setting this will have no effect */
    public DisplayAdTemplateMetadataValues $metadata;
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.RetailMedia.Entities.DisplayAdTemplate, Relewise.Client")
        {
            return DisplayAdTemplate::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = stringRetailMediaEntity::hydrateBase($result, $arr);
        if (array_key_exists("state", $arr))
        {
            $result->state = DisplayAdTemplateEntityState::from($arr["state"]);
        }
        if (array_key_exists("metadata", $arr))
        {
            $result->metadata = DisplayAdTemplateMetadataValues::hydrate($arr["metadata"]);
        }
        return $result;
    }
    
    function setState(DisplayAdTemplateEntityState $state)
    {
        $this->state = $state;
        return $this;
    }
    
    /** Managed server side only, manually setting this will have no effect */
    function setMetadata(DisplayAdTemplateMetadataValues $metadata)
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
