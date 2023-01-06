<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

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
