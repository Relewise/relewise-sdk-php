<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class FeedConfigurationEntityStatestringFeedConfigurationMetadataValuesConfigurationEntity extends stringConfigurationEntity
{
    public string $typeDefinition = "";
    public FeedConfigurationEntityState $state;
    /** Managed on the server side only, manually setting this will have no effect */
    public FeedConfigurationMetadataValues $metadata;
    
    
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
        $result = stringConfigurationEntity::hydrateBase($result, $arr);
        if (array_key_exists("state", $arr))
        {
            $result->state = FeedConfigurationEntityState::from($arr["state"]);
        }
        if (array_key_exists("metadata", $arr))
        {
            $result->metadata = FeedConfigurationMetadataValues::hydrate($arr["metadata"]);
        }
        return $result;
    }
    
    function setState(FeedConfigurationEntityState $state)
    {
        $this->state = $state;
        return $this;
    }
    
    /** Managed on the server side only, manually setting this will have no effect */
    function setMetadata(FeedConfigurationMetadataValues $metadata)
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
