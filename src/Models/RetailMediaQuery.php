<?php declare(strict_types=1);

namespace Relewise\Models;

class RetailMediaQuery
{
    /** Defines the location (f.e. 'Home Page'), placements (f.e. 'main zone' and 'power action') for specific Variation (f.e. 'desktop'). */
    public RetailMediaQueryLocationSelector $location;
    public ?RetailMediaQuerySettings $settings;
    
    public static function create(RetailMediaQueryLocationSelector $location) : RetailMediaQuery
    {
        $result = new RetailMediaQuery();
        $result->location = $location;
        return $result;
    }
    
    public static function hydrate(array $arr) : RetailMediaQuery
    {
        $result = new RetailMediaQuery();
        if (array_key_exists("location", $arr))
        {
            $result->location = RetailMediaQueryLocationSelector::hydrate($arr["location"]);
        }
        if (array_key_exists("settings", $arr))
        {
            $result->settings = RetailMediaQuerySettings::hydrate($arr["settings"]);
        }
        return $result;
    }
    
    /** Defines the location (f.e. 'Home Page'), placements (f.e. 'main zone' and 'power action') for specific Variation (f.e. 'desktop'). */
    function setLocation(RetailMediaQueryLocationSelector $location)
    {
        $this->location = $location;
        return $this;
    }
    
    function setSettings(?RetailMediaQuerySettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
}
