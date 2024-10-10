<?php declare(strict_types=1);

namespace Relewise\Models;

class FilterScopes
{
    public ?FilterScopeSettings $default;
    public ?FilterScopeSettings $fill;
    public static function create() : FilterScopes
    {
        $result = new FilterScopes();
        return $result;
    }
    
    public static function hydrate(array $arr) : FilterScopes
    {
        $result = new FilterScopes();
        if (array_key_exists("default", $arr))
        {
            $result->default = FilterScopeSettings::hydrate($arr["default"]);
        }
        if (array_key_exists("fill", $arr))
        {
            $result->fill = FilterScopeSettings::hydrate($arr["fill"]);
        }
        return $result;
    }
    
    function setDefault(?FilterScopeSettings $default)
    {
        $this->default = $default;
        return $this;
    }
    
    function setFill(?FilterScopeSettings $fill)
    {
        $this->fill = $fill;
        return $this;
    }
}
