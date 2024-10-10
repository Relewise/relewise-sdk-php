<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class FilterScopeSettings
{
    public string $typeDefinition = "";
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.Filters.Settings.ApplyFilterSettings, Relewise.Client")
        {
            return ApplyFilterSettings::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        return $result;
    }
}
