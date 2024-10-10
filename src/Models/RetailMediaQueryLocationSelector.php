<?php declare(strict_types=1);

namespace Relewise\Models;

/** Defines the location (f.e. 'Home Page'), placements (f.e. 'main zone' and 'power action') for specific Variation (f.e. 'desktop'). */
class RetailMediaQueryLocationSelector
{
    public string $key;
    /** The variation to retrieve the retail media content for, e.g. "Desktop", "Mobile", "Tablet" etc. */
    public RetailMediaQueryVariationSelector $variation;
    /** The placements on the specified location. */
    public array $placements;
    public static function create(string $key, RetailMediaQueryVariationSelector $variation, RetailMediaQueryPlacementSelector ... $placements) : RetailMediaQueryLocationSelector
    {
        $result = new RetailMediaQueryLocationSelector();
        $result->key = $key;
        $result->variation = $variation;
        $result->placements = $placements;
        return $result;
    }
    
    public static function hydrate(array $arr) : RetailMediaQueryLocationSelector
    {
        $result = new RetailMediaQueryLocationSelector();
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        if (array_key_exists("variation", $arr))
        {
            $result->variation = RetailMediaQueryVariationSelector::hydrate($arr["variation"]);
        }
        if (array_key_exists("placements", $arr))
        {
            $result->placements = array();
            foreach($arr["placements"] as &$value)
            {
                array_push($result->placements, RetailMediaQueryPlacementSelector::hydrate($value));
            }
        }
        return $result;
    }
    
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    
    /** The variation to retrieve the retail media content for, e.g. "Desktop", "Mobile", "Tablet" etc. */
    function setVariation(RetailMediaQueryVariationSelector $variation)
    {
        $this->variation = $variation;
        return $this;
    }
    
    /** The placements on the specified location. */
    function setPlacements(RetailMediaQueryPlacementSelector ... $placements)
    {
        $this->placements = $placements;
        return $this;
    }
    
    /**
     * The placements on the specified location.
     * @param RetailMediaQueryPlacementSelector[] $placements new value.
     */
    function setPlacementsFromArray(array $placements)
    {
        $this->placements = $placements;
        return $this;
    }
    
    /** The placements on the specified location. */
    function addToPlacements(RetailMediaQueryPlacementSelector $placements)
    {
        if (!isset($this->placements))
        {
            $this->placements = array();
        }
        array_push($this->placements, $placements);
        return $this;
    }
}
