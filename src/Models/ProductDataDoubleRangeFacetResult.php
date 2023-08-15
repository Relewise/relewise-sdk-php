<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductDataDoubleRangeFacetResult extends floatProductDataRangeFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ProductDataDoubleRangeFacetResult, Relewise.Client";
    public static function create(string $key, DataSelectionStrategy $dataSelectionStrategy, ?floatRange $selected, ?floatRangeAvailableFacetValue $available) : ProductDataDoubleRangeFacetResult
    {
        $result = new ProductDataDoubleRangeFacetResult();
        $result->key = $key;
        $result->dataSelectionStrategy = $dataSelectionStrategy;
        $result->selected = $selected;
        $result->available = $available;
        return $result;
    }
    public static function hydrate(array $arr) : ProductDataDoubleRangeFacetResult
    {
        $result = floatProductDataRangeFacetResult::hydrateBase(new ProductDataDoubleRangeFacetResult(), $arr);
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
     * Sets dataSelectionStrategy to a new value.
     * @param DataSelectionStrategy $dataSelectionStrategy new value.
     */
    function setDataSelectionStrategy(DataSelectionStrategy $dataSelectionStrategy)
    {
        $this->dataSelectionStrategy = $dataSelectionStrategy;
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
