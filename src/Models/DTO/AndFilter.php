<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class AndFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.AndFilter, Relewise.Client";
    public array $filters;
    public static function create(array $filters, bool $negated = false) : AndFilter
    {
        $result = new AndFilter();
        $result->filters = $filters;
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : AndFilter
    {
        $result = Filter::hydrateBase(new AndFilter(), $arr);
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
    function withFilters(Filter ... $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    function withNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
    function withCustom(string $key, string $value)
    {
        if (!isset($this->custom))
        {
            $this->custom = array();
        }
        $this->custom[$key] = $value;
        return $this;
    }
}
