<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

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
    function setSelected(?floatRange $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function setAvailable(?floatRangeAvailableFacetValue $available)
    {
        $this->available = $available;
        return $this;
    }
    function setField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
}
