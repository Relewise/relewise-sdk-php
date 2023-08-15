<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class OrFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.OrFilter, Relewise.Client";
    public array $filters;
    public static function create(array $filters, bool $negated = false) : OrFilter
    {
        $result = new OrFilter();
        $result->filters = $filters;
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : OrFilter
    {
        $result = Filter::hydrateBase(new OrFilter(), $arr);
        if (array_key_exists("filters", $arr))
        {
            $result->filters = array();
            foreach($arr["filters"] as &$value)
            {
                array_push($result->filters, Filter::hydrate($value));
            }
        }
        return $result;
    }
    /**
     * Sets filters to a new value.
     * @param Filter[] $filters new value.
     */
    function setFilters(Filter ... $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    /**
     * Sets filters to a new value from an array.
     * @param Filter[] $filters new value.
     */
    function setFiltersFromArray(array $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    /**
     * Adds a new element to filters.
     * @param Filter $filters new element.
     */
    function addToFilters(Filter $filters)
    {
        if (!isset($this->filters))
        {
            $this->filters = array();
        }
        array_push($this->filters, $filters);
        return $this;
    }
    /**
     * Sets negated to a new value.
     * @param bool $negated new value.
     */
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
