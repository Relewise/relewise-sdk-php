<?php declare(strict_types=1);

namespace Relewise\Models;

class FilteredVariantsSettings
{
    public ?FilterCollection $filters;
    public ?bool $inheritFiltersFromRequest;
    public static function create() : FilteredVariantsSettings
    {
        $result = new FilteredVariantsSettings();
        return $result;
    }
    public static function hydrate(array $arr) : FilteredVariantsSettings
    {
        $result = new FilteredVariantsSettings();
        if (array_key_exists("filters", $arr))
        {
            $result->filters = FilterCollection::hydrate($arr["filters"]);
        }
        if (array_key_exists("inheritFiltersFromRequest", $arr))
        {
            $result->inheritFiltersFromRequest = $arr["inheritFiltersFromRequest"];
        }
        return $result;
    }
    function setFilters(?FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    function setInheritFiltersFromRequest(?bool $inheritFiltersFromRequest)
    {
        $this->inheritFiltersFromRequest = $inheritFiltersFromRequest;
        return $this;
    }
}
