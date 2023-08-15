<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class DataObjectDoubleRangesFacet extends floatDataObjectRangesFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.DataObjectDoubleRangesFacet, Relewise.Client";
    public static function create(string $key, ?array $predefinedRanges, ?float $expandedRangeSize, ?floatChainableRange ... $selected) : DataObjectDoubleRangesFacet
    {
        $result = new DataObjectDoubleRangesFacet();
        $result->key = $key;
        $result->predefinedRanges = $predefinedRanges;
        $result->expandedRangeSize = $expandedRangeSize;
        $result->selected = $selected;
        return $result;
    }
    public static function hydrate(array $arr) : DataObjectDoubleRangesFacet
    {
        $result = floatDataObjectRangesFacet::hydrateBase(new DataObjectDoubleRangesFacet(), $arr);
        return $result;
    }
    /**
     * Sets predefinedRanges to a new value.
     * @param ??floatChainableRange[] $predefinedRanges new value.
     */
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
    /**
     * Adds a new element to predefinedRanges.
     * @param ?floatChainableRange $predefinedRanges new element.
     */
    function addToPredefinedRanges(?floatChainableRange $predefinedRanges)
    {
        if (!isset($this->predefinedRanges))
        {
            $this->predefinedRanges = array();
        }
        array_push($this->predefinedRanges, $predefinedRanges);
        return $this;
    }
    /**
     * Sets expandedRangeSize to a new value.
     * @param ?float $expandedRangeSize new value.
     */
    function setExpandedRangeSize(?float $expandedRangeSize)
    {
        $this->expandedRangeSize = $expandedRangeSize;
        return $this;
    }
    /**
     * Sets selected to a new value.
     * @param ??floatChainableRange[] $selected new value.
     */
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
    /**
     * Adds a new element to selected.
     * @param ?floatChainableRange $selected new element.
     */
    function addToSelected(?floatChainableRange $selected)
    {
        if (!isset($this->selected))
        {
            $this->selected = array();
        }
        array_push($this->selected, $selected);
        return $this;
    }
    /**
     * Sets key to a new value.
     * @param string $key new value.
     */
    function setKey(string $key)
    {
        $this->key = $key;
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
    /**
     * Sets settings to a new value.
     * @param ?FacetSettings $settings new value.
     */
    function setSettings(?FacetSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
}
