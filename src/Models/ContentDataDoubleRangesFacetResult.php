<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ContentDataDoubleRangesFacetResult extends floatContentDataRangesFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ContentDataDoubleRangesFacetResult, Relewise.Client";
    public static function create(string $key, ?float $expandedRangeSize, array $selected, ?floatChainableRangeAvailableFacetValue ... $available) : ContentDataDoubleRangesFacetResult
    {
        $result = new ContentDataDoubleRangesFacetResult();
        $result->key = $key;
        $result->expandedRangeSize = $expandedRangeSize;
        $result->selected = $selected;
        $result->available = $available;
        return $result;
    }
    public static function hydrate(array $arr) : ContentDataDoubleRangesFacetResult
    {
        $result = floatContentDataRangesFacetResult::hydrateBase(new ContentDataDoubleRangesFacetResult(), $arr);
        return $result;
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
     * @param ?floatChainableRange[] $selected new value.
     */
    function setSelected(?floatChainableRange ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    /**
     * Sets selected to a new value from an array.
     * @param ?floatChainableRange[] $selected new value.
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
     * Sets available to a new value.
     * @param ?floatChainableRangeAvailableFacetValue[] $available new value.
     */
    function setAvailable(?floatChainableRangeAvailableFacetValue ... $available)
    {
        $this->available = $available;
        return $this;
    }
    /**
     * Sets available to a new value from an array.
     * @param ?floatChainableRangeAvailableFacetValue[] $available new value.
     */
    function setAvailableFromArray(array $available)
    {
        $this->available = $available;
        return $this;
    }
    /**
     * Adds a new element to available.
     * @param ?floatChainableRangeAvailableFacetValue $available new element.
     */
    function addToAvailable(?floatChainableRangeAvailableFacetValue $available)
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
