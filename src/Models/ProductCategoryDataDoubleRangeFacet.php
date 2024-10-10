<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductCategoryDataDoubleRangeFacet extends floatProductCategoryDataRangeFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ProductCategoryDataDoubleRangeFacet, Relewise.Client";
    
    public static function create(string $key, ?floatRange $selected) : ProductCategoryDataDoubleRangeFacet
    {
        $result = new ProductCategoryDataDoubleRangeFacet();
        $result->key = $key;
        $result->selected = $selected;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductCategoryDataDoubleRangeFacet
    {
        $result = floatProductCategoryDataRangeFacet::hydrateBase(new ProductCategoryDataDoubleRangeFacet(), $arr);
        return $result;
    }
    
    function setSelected(?floatRange $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    
    function setField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
    
    function setSettings(?FacetSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
}
