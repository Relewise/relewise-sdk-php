<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class BrandFacetResult extends stringBrandNameAndIdResultValueFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.BrandFacetResult, Relewise.Client";
    public static function create(array $selected, BrandNameAndIdResultAvailableFacetValue ... $available) : BrandFacetResult
    {
        $result = new BrandFacetResult();
        $result->selected = $selected;
        $result->available = $available;
        return $result;
    }
    public static function hydrate(array $arr) : BrandFacetResult
    {
        $result = stringBrandNameAndIdResultValueFacetResult::hydrateBase(new BrandFacetResult(), $arr);
        return $result;
    }
    function setSelected(string ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    /** @param string[] $selected new value. */
    function setSelectedFromArray(array $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function addToSelected(string $selected)
    {
        if (!isset($this->selected))
        {
            $this->selected = array();
        }
        array_push($this->selected, $selected);
        return $this;
    }
    function setAvailable(BrandNameAndIdResultAvailableFacetValue ... $available)
    {
        $this->available = $available;
        return $this;
    }
    /** @param BrandNameAndIdResultAvailableFacetValue[] $available new value. */
    function setAvailableFromArray(array $available)
    {
        $this->available = $available;
        return $this;
    }
    function addToAvailable(BrandNameAndIdResultAvailableFacetValue $available)
    {
        if (!isset($this->available))
        {
            $this->available = array();
        }
        array_push($this->available, $available);
        return $this;
    }
    function setField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
}
