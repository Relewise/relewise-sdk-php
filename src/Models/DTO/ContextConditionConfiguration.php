<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

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
}
