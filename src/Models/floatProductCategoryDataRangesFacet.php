<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class floatProductCategoryDataRangesFacet extends floatDataRangesFacet
{
    public string $typeDefinition = "";
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ProductCategoryDataDoubleRangesFacet, Relewise.Client")
        {
            return ProductCategoryDataDoubleRangesFacet::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = floatDataRangesFacet::hydrateBase($result, $arr);
        return $result;
    }
    function setPredefinedRanges(?floatChainableRange ... $predefinedRanges)
    {
        $this->predefinedRanges = $predefinedRanges;
        return $this;
    }
    /** @param ??floatChainableRange[] $predefinedRanges new value. */
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
    /** @param ??floatChainableRange[] $selected new value. */
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
