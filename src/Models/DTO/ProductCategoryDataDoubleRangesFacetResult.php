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
    function setAvailable(?floatChainableRangeAvailableFacetValue ... $available)
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
