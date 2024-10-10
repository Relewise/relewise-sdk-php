<?php declare(strict_types=1);

namespace Relewise\Models;

class ApplyFilterSettings extends FilterScopeSettings
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.Settings.ApplyFilterSettings, Relewise.Client";
    
    public bool $apply;
    public static function create(bool $apply) : ApplyFilterSettings
    {
        $result = new ApplyFilterSettings();
        $result->apply = $apply;
        return $result;
    }
    
    public static function hydrate(array $arr) : ApplyFilterSettings
    {
        $result = FilterScopeSettings::hydrateBase(new ApplyFilterSettings(), $arr);
        if (array_key_exists("apply", $arr))
        {
            $result->apply = $arr["apply"];
        }
        return $result;
    }
    
    function setApply(bool $apply)
    {
        $this->apply = $apply;
        return $this;
    }
}
