<?php declare(strict_types=1);

namespace Relewise\Models;

class ContentDataDoubleRangesFacet extends floatContentDataRangesFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ContentDataDoubleRangesFacet, Relewise.Client";
    
    public static function create(string $key, ?array $predefinedRanges, ?float $expandedRangeSize, ?floatChainableRange ... $selected) : ContentDataDoubleRangesFacet
    {
        $result = new ContentDataDoubleRangesFacet();
        $result->key = $key;
        $result->predefinedRanges = $predefinedRanges;
        $result->expandedRangeSize = $expandedRangeSize;
        $result->selected = $selected;
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentDataDoubleRangesFacet
    {
        $result = floatContentDataRangesFacet::hydrateBase(new ContentDataDoubleRangesFacet(), $arr);
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
