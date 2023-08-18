<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductAssortmentFacetResult extends AssortmentFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ProductAssortmentFacetResult, Relewise.Client";
    public AssortmentSelectionStrategy $assortmentSelectionStrategy;
    public static function create(AssortmentSelectionStrategy $assortmentSelectionStrategy, AssortmentFilterType $assortmentFilterType, array $selected, intAvailableFacetValue ... $available) : ProductAssortmentFacetResult
    {
        $result = new ProductAssortmentFacetResult();
        $result->assortmentSelectionStrategy = $assortmentSelectionStrategy;
        $result->assortmentFilterType = $assortmentFilterType;
        $result->selected = $selected;
        $result->available = $available;
        return $result;
    }
    public static function hydrate(array $arr) : ProductAssortmentFacetResult
    {
        $result = AssortmentFacetResult::hydrateBase(new ProductAssortmentFacetResult(), $arr);
        if (array_key_exists("assortmentSelectionStrategy", $arr))
        {
            $result->assortmentSelectionStrategy = AssortmentSelectionStrategy::from($arr["assortmentSelectionStrategy"]);
        }
        return $result;
    }
    function setAssortmentSelectionStrategy(AssortmentSelectionStrategy $assortmentSelectionStrategy)
    {
        $this->assortmentSelectionStrategy = $assortmentSelectionStrategy;
        return $this;
    }
    function setAssortmentFilterType(AssortmentFilterType $assortmentFilterType)
    {
        $this->assortmentFilterType = $assortmentFilterType;
        return $this;
    }
    function setSelected(int ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    /**
     * Sets selected to a new value from an array.
     * @param int[] $selected new value.
     */
    function setSelectedFromArray(array $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    /**
     * Adds a new element to selected.
     * @param int $selected new element.
     */
    function addToSelected(int $selected)
    {
        if (!isset($this->selected))
        {
            $this->selected = array();
        }
        array_push($this->selected, $selected);
        return $this;
    }
    function setAvailable(intAvailableFacetValue ... $available)
    {
        $this->available = $available;
        return $this;
    }
    /**
     * Sets available to a new value from an array.
     * @param intAvailableFacetValue[] $available new value.
     */
    function setAvailableFromArray(array $available)
    {
        $this->available = $available;
        return $this;
    }
    /**
     * Adds a new element to available.
     * @param intAvailableFacetValue $available new element.
     */
    function addToAvailable(intAvailableFacetValue $available)
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
