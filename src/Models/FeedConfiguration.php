<?php declare(strict_types=1);

namespace Relewise\Models;

/** Stores a feed configuration together with its metadata and configured feed sources. */
class FeedConfiguration extends FeedConfigurationEntityStatestringFeedConfigurationMetadataValuesConfigurationEntity
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Feed.FeedConfiguration, Relewise.Client";
    /** The display name for this configuration. */
    public string $name;
    /** The stable lookup key for this configuration. The key is the uppercase version of Name with whitespace replaced by underscores. For example, Feed Default becomes FEED_DEFAULT. */
    public ?string $key;
    /** Indicates whether this configuration is the default configuration. */
    public bool $isDefault;
    /** The configured feed sources for this configuration. */
    public FeedSourceConfiguration $sources;
    
    public static function create(string $name) : FeedConfiguration
    {
        $result = new FeedConfiguration();
        $result->name = $name;
        return $result;
    }
    
    public static function hydrate(array $arr) : FeedConfiguration
    {
        $result = FeedConfigurationEntityStatestringFeedConfigurationMetadataValuesConfigurationEntity::hydrateBase(new FeedConfiguration(), $arr);
        if (array_key_exists("name", $arr))
        {
            $result->name = $arr["name"];
        }
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        if (array_key_exists("isDefault", $arr))
        {
            $result->isDefault = $arr["isDefault"];
        }
        if (array_key_exists("sources", $arr))
        {
            $result->sources = FeedSourceConfiguration::hydrate($arr["sources"]);
        }
        return $result;
    }
    
    /** The display name for this configuration. */
    function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }
    
    /** The stable lookup key for this configuration. The key is the uppercase version of Name with whitespace replaced by underscores. For example, Feed Default becomes FEED_DEFAULT. */
    function setKey(?string $key)
    {
        $this->key = $key;
        return $this;
    }
    
    /** Indicates whether this configuration is the default configuration. */
    function setIsDefault(bool $isDefault)
    {
        $this->isDefault = $isDefault;
        return $this;
    }
    
    /** The configured feed sources for this configuration. */
    function setSources(FeedSourceConfiguration $sources)
    {
        $this->sources = $sources;
        return $this;
    }
    
    function setState(FeedConfigurationEntityState $state)
    {
        $this->state = $state;
        return $this;
    }
    
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
