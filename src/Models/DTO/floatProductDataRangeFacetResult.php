<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

abstract class floatProductDataRangeFacetResult extends floatRangeFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ProductDataRangeFacetResult`1[[System.Nullable`1[[System.Double, System.Private.CoreLib, Version=7.0.0.0, Culture=neutral, PublicKeyToken=7cec85d7bea7798e]], System.Private.CoreLib, Version=7.0.0.0, Culture=neutral, PublicKeyToken=7cec85d7bea7798e]], Relewise.Client";
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
    function withKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    function withDataSelectionStrategy(DataSelectionStrategy $dataSelectionStrategy)
    {
        $this->dataSelectionStrategy = $dataSelectionStrategy;
        return $this;
    }
    function withSelected(?floatRange $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function withAvailable(?floatRangeAvailableFacetValue $available)
    {
        $this->available = $available;
        return $this;
    }
    function withField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
}
