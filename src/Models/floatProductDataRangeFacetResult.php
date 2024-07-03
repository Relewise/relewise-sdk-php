<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class floatProductDataRangeFacetResult extends floatRangeFacetResult
{
    public string $typeDefinition = "";
    public string $key;
    public DataSelectionStrategy $dataSelectionStrategy;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Result.ProductDataDoubleRangeFacetResult, Relewise.Client")
        {
            return ProductDataDoubleRangeFacetResult::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = floatRangeFacetResult::hydrateBase($result, $arr);
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        if (array_key_exists("dataSelectionStrategy", $arr))
        {
            $result->dataSelectionStrategy = DataSelectionStrategy::from($arr["dataSelectionStrategy"]);
        }
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
