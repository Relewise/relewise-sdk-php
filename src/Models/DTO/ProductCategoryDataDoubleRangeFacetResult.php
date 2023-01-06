<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductCategoryDataDoubleRangeFacetResult extends floatProductCategoryDataRangeFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ProductCategoryDataDoubleRangeFacetResult, Relewise.Client";
    public static function create() : ProductCategoryDataDoubleRangeFacetResult
    {
        $result = new ProductCategoryDataDoubleRangeFacetResult();
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryDataDoubleRangeFacetResult
    {
        $result = floatProductCategoryDataRangeFacetResult::hydrateBase(new ProductCategoryDataDoubleRangeFacetResult(), $arr);
        return $result;
    }
    function setKey(string $key)
    {
        $this->key = $key;
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
