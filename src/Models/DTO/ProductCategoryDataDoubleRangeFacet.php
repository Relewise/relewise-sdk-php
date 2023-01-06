<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductCategoryDataDoubleRangeFacet extends floatProductCategoryDataRangeFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ProductCategoryDataDoubleRangeFacet, Relewise.Client";
    public static function create() : ProductCategoryDataDoubleRangeFacet
    {
        $result = new ProductCategoryDataDoubleRangeFacet();
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryDataDoubleRangeFacet
    {
        $result = floatProductCategoryDataRangeFacet::hydrateBase(new ProductCategoryDataDoubleRangeFacet(), $arr);
        return $result;
    }
    function withSelected(?floatRange $selected)
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
