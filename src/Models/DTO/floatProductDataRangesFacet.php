<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

abstract class floatProductDataRangesFacet extends floatDataRangesFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ProductDataRangesFacet`1[[System.Nullable`1[[System.Double, System.Private.CoreLib, Version=7.0.0.0, Culture=neutral, PublicKeyToken=7cec85d7bea7798e]], System.Private.CoreLib, Version=7.0.0.0, Culture=neutral, PublicKeyToken=7cec85d7bea7798e]], Relewise.Client";
    public DataSelectionStrategy $dataSelectionStrategy;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ProductDataDoubleRangesFacet, Relewise.Client")
        {
            return ProductDataDoubleRangesFacet::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = floatDataRangesFacet::hydrateBase($result, $arr);
        if (array_key_exists("dataSelectionStrategy", $arr))
        {
            $result->dataSelectionStrategy = DataSelectionStrategy::from($arr["dataSelectionStrategy"]);
        }
        return $result;
    }
    function withDataSelectionStrategy(DataSelectionStrategy $dataSelectionStrategy)
    {
        $this->dataSelectionStrategy = $dataSelectionStrategy;
        return $this;
    }
    function withPredefinedRanges(?floatChainableRange ... $predefinedRanges)
    {
        $this->predefinedRanges = $predefinedRanges;
        return $this;
    }
    function withExpandedRangeSize(?float $expandedRangeSize)
    {
        $this->expandedRangeSize = $expandedRangeSize;
        return $this;
    }
    function withSelected(?floatChainableRange ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function withKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    function withField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
    function withSettings(?FacetSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
}
