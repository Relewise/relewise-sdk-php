<?php declare(strict_types=1);

namespace Relewise\Models;

class FacetSettings
{
    public bool $alwaysIncludeSelectedInAvailable;
    public bool $includeZeroHitsInAvailable;
    /** Defines how to sort the returned available facets Supported sorting are: null (default) or ByHitsFacetSorting */
    public ?FacetSorting $sorting;
    /** Limits how many available values can be returned for this facet. If this is used together with a Sorting then it will take the first values after the available values have been sorted. Note: 'Selected' values are always included in the available values, even if they exceed the Take limit, this is to ensure that the selected value is always visible to the user and avoid filtering by hidden facets */
    public ?int $take;
    
    public static function create() : FacetSettings
    {
        $result = new FacetSettings();
        return $result;
    }
    
    public static function hydrate(array $arr) : FacetSettings
    {
        $result = new FacetSettings();
        if (array_key_exists("alwaysIncludeSelectedInAvailable", $arr))
        {
            $result->alwaysIncludeSelectedInAvailable = $arr["alwaysIncludeSelectedInAvailable"];
        }
        if (array_key_exists("includeZeroHitsInAvailable", $arr))
        {
            $result->includeZeroHitsInAvailable = $arr["includeZeroHitsInAvailable"];
        }
        if (array_key_exists("sorting", $arr))
        {
            $result->sorting = FacetSorting::hydrate($arr["sorting"]);
        }
        if (array_key_exists("take", $arr))
        {
            $result->take = $arr["take"];
        }
        return $result;
    }
    
    function setAlwaysIncludeSelectedInAvailable(bool $alwaysIncludeSelectedInAvailable)
    {
        $this->alwaysIncludeSelectedInAvailable = $alwaysIncludeSelectedInAvailable;
        return $this;
    }
    
    function setIncludeZeroHitsInAvailable(bool $includeZeroHitsInAvailable)
    {
        $this->includeZeroHitsInAvailable = $includeZeroHitsInAvailable;
        return $this;
    }
    
    /** Defines how to sort the returned available facets Supported sorting are: null (default) or ByHitsFacetSorting */
    function setSorting(?FacetSorting $sorting)
    {
        $this->sorting = $sorting;
        return $this;
    }
    
    /** Limits how many available values can be returned for this facet. If this is used together with a Sorting then it will take the first values after the available values have been sorted. Note: 'Selected' values are always included in the available values, even if they exceed the Take limit, this is to ensure that the selected value is always visible to the user and avoid filtering by hidden facets */
    function setTake(?int $take)
    {
        $this->take = $take;
        return $this;
    }
}
