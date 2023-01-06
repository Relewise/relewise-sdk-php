<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductDataDoubleRangesFacetResult extends floatProductDataRangesFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ProductDataDoubleRangesFacetResult, Relewise.Client";
    public static function create() : ProductDataDoubleRangesFacetResult
    {
        $result = new ProductDataDoubleRangesFacetResult();
        return $result;
    }
    public static function hydrate(array $arr) : ProductDataDoubleRangesFacetResult
    {
        $result = floatProductDataRangesFacetResult::hydrateBase(new ProductDataDoubleRangesFacetResult(), $arr);
        return $result;
    }
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    function setDataSelectionStrategy(DataSelectionStrategy $dataSelectionStrategy)
    {
        $this->dataSelectionStrategy = $dataSelectionStrategy;
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
