<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ContextConditionConfiguration
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Merchandising.Configurations.ContextConditionConfiguration, Relewise.Client";
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
    /**
     * Sets filters to a new value.
     * @param RequestContextFilter[] $filters new value.
     */
    function setFilters(RequestContextFilter ... $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    /**
     * Sets filters to a new value from an array.
     * @param RequestContextFilter[] $filters new value.
     */
    function setFiltersFromArray(array $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    /**
     * Adds a new element to filters.
     * @param RequestContextFilter $filters new element.
     */
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
