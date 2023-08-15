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
    /**
     * Sets selected to a new value.
     * @param string[] $selected new value.
     */
    function setSelected(string ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    /**
     * Sets selected to a new value from an array.
     * @param string[] $selected new value.
     */
    function setSelectedFromArray(array $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    /**
     * Adds a new element to selected.
     * @param string $selected new element.
     */
    function addToSelected(string $selected)
    {
        if (!isset($this->selected))
        {
            $this->selected = array();
        }
        array_push($this->selected, $selected);
        return $this;
    }
    /**
     * Sets available to a new value.
     * @param BrandNameAndIdResultAvailableFacetValue[] $available new value.
     */
    function setAvailable(BrandNameAndIdResultAvailableFacetValue ... $available)
    {
        $this->available = $available;
        return $this;
    }
    /**
     * Sets available to a new value from an array.
     * @param BrandNameAndIdResultAvailableFacetValue[] $available new value.
     */
    function setAvailableFromArray(array $available)
    {
        $this->available = $available;
        return $this;
    }
    /**
     * Adds a new element to available.
     * @param BrandNameAndIdResultAvailableFacetValue $available new element.
     */
    function addToAvailable(BrandNameAndIdResultAvailableFacetValue $available)
    {
        if (!isset($this->available))
        {
            $this->available = array();
        }
        array_push($this->available, $available);
        return $this;
    }
    /**
     * Sets field to a new value.
     * @param FacetingField $field new value.
     */
    function setField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
}
