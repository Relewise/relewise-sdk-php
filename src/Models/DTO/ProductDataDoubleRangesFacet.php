<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductDataDoubleRangesFacet extends floatProductDataRangesFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ProductDataDoubleRangesFacet, Relewise.Client";
    public static function create() : ProductDataDoubleRangesFacet
    {
        $result = new ProductDataDoubleRangesFacet();
        return $result;
    }
    public static function hydrate(array $arr) : ProductDataDoubleRangesFacet
    {
        $result = floatProductDataRangesFacet::hydrateBase(new ProductDataDoubleRangesFacet(), $arr);
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
