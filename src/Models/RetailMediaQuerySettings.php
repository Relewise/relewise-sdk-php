<?php declare(strict_types=1);

namespace Relewise\Models;

class RetailMediaQuerySettings
{
    public ?SelectedDisplayAdPropertiesSettings $selectedDisplayAdProperties;
    
    public static function create() : RetailMediaQuerySettings
    {
        $result = new RetailMediaQuerySettings();
        return $result;
    }
    
    public static function hydrate(array $arr) : RetailMediaQuerySettings
    {
        $result = new RetailMediaQuerySettings();
        if (array_key_exists("selectedDisplayAdProperties", $arr))
        {
            $result->selectedDisplayAdProperties = SelectedDisplayAdPropertiesSettings::hydrate($arr["selectedDisplayAdProperties"]);
        }
        return $result;
    }
    
    function setSelectedDisplayAdProperties(?SelectedDisplayAdPropertiesSettings $selectedDisplayAdProperties)
    {
        $this->selectedDisplayAdProperties = $selectedDisplayAdProperties;
        return $this;
    }
}
