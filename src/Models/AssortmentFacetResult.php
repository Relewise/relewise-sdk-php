<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class AssortmentFacetResult extends intintValueFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.AssortmentFacetResult, Relewise.Client";
    public AssortmentFilterType $assortmentFilterType;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Result.ProductAssortmentFacetResult, Relewise.Client")
        {
            return ProductAssortmentFacetResult::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Result.ContentAssortmentFacetResult, Relewise.Client")
        {
            return ContentAssortmentFacetResult::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Result.ProductCategoryAssortmentFacetResult, Relewise.Client")
        {
            return ProductCategoryAssortmentFacetResult::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = intintValueFacetResult::hydrateBase($result, $arr);
        if (array_key_exists("assortmentFilterType", $arr))
        {
            $result->assortmentFilterType = AssortmentFilterType::from($arr["assortmentFilterType"]);
        }
        return $result;
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
