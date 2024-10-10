<?php declare(strict_types=1);

namespace Relewise\Models;

class FacetSettings
{
    public bool $alwaysIncludeSelectedInAvailable;
    
    public bool $includeZeroHitsInAvailable;
    
    public static function create() : FacetSettings
    {
        $result = new FacetSettings();
        return $result;
    }
    
    public static function hydrate(array $arr) : FacetSettings
    {
        $result = new FacetSettings();
        if (array_key_exists("alwaysIncludeSelectedInAvailable", $arr))
        {
            $result->alwaysIncludeSelectedInAvailable = $arr["alwaysIncludeSelectedInAvailable"];
        }
        if (array_key_exists("includeZeroHitsInAvailable", $arr))
        {
            $result->includeZeroHitsInAvailable = $arr["includeZeroHitsInAvailable"];
        }
        return $result;
    }
    
    function setAlwaysIncludeSelectedInAvailable(bool $alwaysIncludeSelectedInAvailable)
    {
        $this->alwaysIncludeSelectedInAvailable = $alwaysIncludeSelectedInAvailable;
        return $this;
    }
    
    function setIncludeZeroHitsInAvailable(bool $includeZeroHitsInAvailable)
    {
        $this->includeZeroHitsInAvailable = $includeZeroHitsInAvailable;
        return $this;
    }
}
