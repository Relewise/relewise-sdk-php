<?php declare(strict_types=1);

namespace Relewise\Models;

/** Represents a location in the system where promotions can be shown, like 'Front Page', as well as Placements (like 'main zone', or 'power action'). */
class Location extends LocationEntityStateLocationMetadataValuesRetailMediaEntity
{
    public string $typeDefinition = "Relewise.Client.DataTypes.RetailMedia.Location, Relewise.Client";
    /** The name of this location, e.g. "Front page", "PDP", "Home screen" etc. */
    public string $name;
    /** A key which is automatically computed based on the name of the location. This will be used as identifier to reference this location when retrieving Retail Media content for it from the consuming client This value gets created the first time the location is saved and cannot be modified in the future. Manually assigning a value to this will have no effect. */
    public ?string $key;
    /** The placements where promotions may be displayed at this location If null or empty, no promotions will be shown at this location */
    public ?LocationPlacementCollection $placements;
    /** Defines what kinds of promotions are supported by this location */
    public ?PromotionSpecificationCollection $supportedPromotions;
    public static function create(?string $id, LocationEntityState $state, string $name) : Location
    {
        $result = new Location();
        $result->id = $id;
        $result->state = $state;
        $result->name = $name;
        return $result;
    }
    
    public static function hydrate(array $arr) : Location
    {
        $result = LocationEntityStateLocationMetadataValuesRetailMediaEntity::hydrateBase(new Location(), $arr);
        if (array_key_exists("name", $arr))
        {
            $result->name = $arr["name"];
        }
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        if (array_key_exists("placements", $arr))
        {
            $result->placements = LocationPlacementCollection::hydrate($arr["placements"]);
        }
        if (array_key_exists("supportedPromotions", $arr))
        {
            $result->supportedPromotions = PromotionSpecificationCollection::hydrate($arr["supportedPromotions"]);
        }
        return $result;
    }
    
    /** The name of this location, e.g. "Front page", "PDP", "Home screen" etc. */
    function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }
    
    /** A key which is automatically computed based on the name of the location. This will be used as identifier to reference this location when retrieving Retail Media content for it from the consuming client This value gets created the first time the location is saved and cannot be modified in the future. Manually assigning a value to this will have no effect. */
    function setKey(?string $key)
    {
        $this->key = $key;
        return $this;
    }
    
    /** The placements where promotions may be displayed at this location If null or empty, no promotions will be shown at this location */
    function setPlacements(?LocationPlacementCollection $placements)
    {
        $this->placements = $placements;
        return $this;
    }
    
    /** Defines what kinds of promotions are supported by this location */
    function setSupportedPromotions(?PromotionSpecificationCollection $supportedPromotions)
    {
        $this->supportedPromotions = $supportedPromotions;
        return $this;
    }
    
    function setState(LocationEntityState $state)
    {
        $this->state = $state;
        return $this;
    }
    
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
