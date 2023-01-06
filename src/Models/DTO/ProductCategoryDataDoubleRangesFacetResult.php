<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductCategoryDataDoubleRangesFacetResult extends floatProductCategoryDataRangesFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ProductCategoryDataDoubleRangesFacetResult, Relewise.Client";
    public static function create() : ProductCategoryDataDoubleRangesFacetResult
    {
        $result = new ProductCategoryDataDoubleRangesFacetResult();
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryDataDoubleRangesFacetResult
    {
        $result = floatProductCategoryDataRangesFacetResult::hydrateBase(new ProductCategoryDataDoubleRangesFacetResult(), $arr);
        return $result;
    }
    function withKey(string $key)
    {
        $this->key = $key;
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
    function withAvailable(?floatChainableRangeAvailableFacetValue ... $available)
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
