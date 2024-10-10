<?php declare(strict_types=1);

namespace Relewise\Models;

class ContextConditionConfiguration
{
    public array $filters;
    public static function create() : ContextConditionConfiguration
    {
        $result = new ContextConditionConfiguration();
        return $result;
    }
    
    public static function hydrate(array $arr) : ContextConditionConfiguration
    {
        $result = new ContextConditionConfiguration();
        if (array_key_exists("filters", $arr))
        {
            $result->filters = array();
            foreach($arr["filters"] as &$value)
            {
                array_push($result->filters, RequestContextFilter::hydrate($value));
            }
        }
        return $result;
    }
    
    function setFilters(RequestContextFilter ... $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    
    /** @param RequestContextFilter[] $filters new value. */
    function setFiltersFromArray(array $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    
    function addToFilters(RequestContextFilter $filters)
    {
        if (!isset($this->filters))
        {
            $this->filters = array();
        }
        array_push($this->filters, $filters);
        return $this;
    }
}
