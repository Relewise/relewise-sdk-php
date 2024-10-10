<?php declare(strict_types=1);

namespace Relewise\Models;

/** Represents a placement within a location in the system where promotions can be shown */
class LocationPlacement
{
    /** The name of this placement, e.g. "Top", "Bottom", "Right", "Overlay" etc. */
    public string $name;
    /** A key which is automatically computed based on the name. This value gets created the first time the placement is saved and cannot be modified in the future. Manually assigning a value to this will have no effect. */
    public ?string $key;
    /** The variations of this placement, e.g. to support multiple different views, like Mobile, Tablet, Desktop, Email template etc. If null or empty, no promotions will be shown for this placement */
    public ?LocationPlacementVariationCollection $variations;
    public static function create(string $name, ?LocationPlacementVariationCollection $variations) : LocationPlacement
    {
        $result = new LocationPlacement();
        $result->name = $name;
        $result->variations = $variations;
        return $result;
    }
    public static function hydrate(array $arr) : LocationPlacement
    {
        $result = new LocationPlacement();
        if (array_key_exists("name", $arr))
        {
            $result->name = $arr["name"];
        }
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        if (array_key_exists("variations", $arr))
        {
            $result->variations = LocationPlacementVariationCollection::hydrate($arr["variations"]);
        }
        return $result;
    }
    
    /** The name of this placement, e.g. "Top", "Bottom", "Right", "Overlay" etc. */
    function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }
    
    /** A key which is automatically computed based on the name. This value gets created the first time the placement is saved and cannot be modified in the future. Manually assigning a value to this will have no effect. */
    function setKey(?string $key)
    {
        $this->key = $key;
        return $this;
    }
    
    /** The variations of this placement, e.g. to support multiple different views, like Mobile, Tablet, Desktop, Email template etc. If null or empty, no promotions will be shown for this placement */
    function setVariations(?LocationPlacementVariationCollection $variations)
    {
        $this->variations = $variations;
        return $this;
    }
}
