<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductCategoryDataDoubleRangesFacetResult extends floatProductCategoryDataRangesFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ProductCategoryDataDoubleRangesFacetResult, Relewise.Client";
    
    public static function create(string $key, ?float $expandedRangeSize, array $selected, ?floatChainableRangeAvailableFacetValue ... $available) : ProductCategoryDataDoubleRangesFacetResult
    {
        $result = new ProductCategoryDataDoubleRangesFacetResult();
        $result->key = $key;
        $result->expandedRangeSize = $expandedRangeSize;
        $result->selected = $selected;
        $result->available = $available;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductCategoryDataDoubleRangesFacetResult
    {
        $result = floatProductCategoryDataRangesFacetResult::hydrateBase(new ProductCategoryDataDoubleRangesFacetResult(), $arr);
        return $result;
    }
    
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    
    function setExpandedRangeSize(?float $expandedRangeSize)
    {
        $this->expandedRangeSize = $expandedRangeSize;
        return $this;
    }
    
    function setSelected(?floatChainableRange ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    
    /** @param ?floatChainableRange[] $selected new value. */
    function setSelectedFromArray(array $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    
    function addToSelected(?floatChainableRange $selected)
    {
        if (!isset($this->selected))
        {
            $this->selected = array();
        }
        array_push($this->selected, $selected);
        return $this;
    }
    
    function setAvailable(?floatChainableRangeAvailableFacetValue ... $available)
    {
        $this->available = $available;
        return $this;
    }
    
    /** @param ?floatChainableRangeAvailableFacetValue[] $available new value. */
    function setAvailableFromArray(array $available)
    {
        $this->available = $available;
        return $this;
    }
    
    function addToAvailable(?floatChainableRangeAvailableFacetValue $available)
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
