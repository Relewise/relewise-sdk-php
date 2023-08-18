<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductDataDoubleRangesFacet extends floatProductDataRangesFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ProductDataDoubleRangesFacet, Relewise.Client";
    public static function create(string $key, DataSelectionStrategy $dataSelectionStrategy, ?array $predefinedRanges, ?float $expandedRangeSize, ?floatChainableRange ... $selected) : ProductDataDoubleRangesFacet
    {
        $result = new ProductDataDoubleRangesFacet();
        $result->key = $key;
        $result->dataSelectionStrategy = $dataSelectionStrategy;
        $result->predefinedRanges = $predefinedRanges;
        $result->expandedRangeSize = $expandedRangeSize;
        $result->selected = $selected;
        return $result;
    }
    public static function hydrate(array $arr) : ProductDataDoubleRangesFacet
    {
        $result = floatProductDataRangesFacet::hydrateBase(new ProductDataDoubleRangesFacet(), $arr);
        return $result;
    }
    function setDataSelectionStrategy(DataSelectionStrategy $dataSelectionStrategy)
    {
        $this->dataSelectionStrategy = $dataSelectionStrategy;
        return $this;
    }
    function setPredefinedRanges(?floatChainableRange ... $predefinedRanges)
    {
        $this->predefinedRanges = $predefinedRanges;
        return $this;
    }
    /**
     * Sets predefinedRanges to a new value from an array.
     * @param ??floatChainableRange[] $predefinedRanges new value.
     */
    function setPredefinedRangesFromArray(array $predefinedRanges)
    {
        $this->predefinedRanges = $predefinedRanges;
        return $this;
    }
    function addToPredefinedRanges(?floatChainableRange $predefinedRanges)
    {
        if (!isset($this->predefinedRanges))
        {
            $this->predefinedRanges = array();
        }
        array_push($this->predefinedRanges, $predefinedRanges);
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
    /**
     * Sets selected to a new value from an array.
     * @param ??floatChainableRange[] $selected new value.
     */
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
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    function setField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
    function setSettings(?FacetSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
}
