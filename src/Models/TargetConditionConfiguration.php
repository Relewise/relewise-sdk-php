<?php declare(strict_types=1);

namespace Relewise\Models;

class TargetConditionConfiguration
{
    public FilterCollection $filters;
    public static function create() : TargetConditionConfiguration
    {
        $result = new TargetConditionConfiguration();
        return $result;
    }
    
    public static function hydrate(array $arr) : TargetConditionConfiguration
    {
        $result = new TargetConditionConfiguration();
        if (array_key_exists("filters", $arr))
        {
            $result->filters = FilterCollection::hydrate($arr["filters"]);
        }
        return $result;
    }
    
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
}
