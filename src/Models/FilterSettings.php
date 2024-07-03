<?php declare(strict_types=1);

namespace Relewise\Models;

class FilterSettings
{
    public ?FilterScopes $scopes;
    public static function create() : FilterSettings
    {
        $result = new FilterSettings();
        return $result;
    }
    public static function hydrate(array $arr) : FilterSettings
    {
        $result = new FilterSettings();
        if (array_key_exists("scopes", $arr))
        {
            $result->scopes = FilterScopes::hydrate($arr["scopes"]);
        }
        return $result;
    }
    function setScopes(?FilterScopes $scopes)
    {
        $this->scopes = $scopes;
        return $this;
    }
}
