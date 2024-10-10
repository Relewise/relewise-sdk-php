<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductCategoryAssortmentFacetResult extends AssortmentFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ProductCategoryAssortmentFacetResult, Relewise.Client";
    public static function create(AssortmentFilterType $assortmentFilterType, array $selected, intAvailableFacetValue ... $available) : ProductCategoryAssortmentFacetResult
    {
        $result = new ProductCategoryAssortmentFacetResult();
        $result->assortmentFilterType = $assortmentFilterType;
        $result->selected = $selected;
        $result->available = $available;
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryAssortmentFacetResult
    {
        $result = AssortmentFacetResult::hydrateBase(new ProductCategoryAssortmentFacetResult(), $arr);
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
    
    /** @param int[] $selected new value. */
    function setSelectedFromArray(array $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    
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
    
    /** @param intAvailableFacetValue[] $available new value. */
    function setAvailableFromArray(array $available)
    {
        $this->available = $available;
        return $this;
    }
    
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
