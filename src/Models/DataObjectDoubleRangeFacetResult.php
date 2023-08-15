<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class DataObjectDoubleRangeFacetResult extends floatDataObjectRangeFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.DataObjectDoubleRangeFacetResult, Relewise.Client";
    public static function create(string $key, ?floatRange $selected, ?floatRangeAvailableFacetValue $available) : DataObjectDoubleRangeFacetResult
    {
        $result = new DataObjectDoubleRangeFacetResult();
        $result->key = $key;
        $result->selected = $selected;
        $result->available = $available;
        return $result;
    }
    public static function hydrate(array $arr) : DataObjectDoubleRangeFacetResult
    {
        $result = floatDataObjectRangeFacetResult::hydrateBase(new DataObjectDoubleRangeFacetResult(), $arr);
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
     * Sets selected to a new value.
     * @param ?floatRange $selected new value.
     */
    function setSelected(?floatRange $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    /**
     * Sets available to a new value.
     * @param ?floatRangeAvailableFacetValue $available new value.
     */
    function setAvailable(?floatRangeAvailableFacetValue $available)
    {
        $this->available = $available;
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
