<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class DataObjectDoubleRangesFacetResult extends floatDataObjectRangesFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.DataObjectDoubleRangesFacetResult, Relewise.Client";
    public static function create(string $key, ?float $expandedRangeSize, array $selected, ?floatChainableRangeAvailableFacetValue ... $available) : DataObjectDoubleRangesFacetResult
    {
        $result = new DataObjectDoubleRangesFacetResult();
        $result->key = $key;
        $result->expandedRangeSize = $expandedRangeSize;
        $result->selected = $selected;
        $result->available = $available;
        return $result;
    }
    public static function hydrate(array $arr) : DataObjectDoubleRangesFacetResult
    {
        $result = floatDataObjectRangesFacetResult::hydrateBase(new DataObjectDoubleRangesFacetResult(), $arr);
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
