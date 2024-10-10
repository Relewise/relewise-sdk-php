<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductDataDoubleRangeFacet extends floatProductDataRangeFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ProductDataDoubleRangeFacet, Relewise.Client";
    public static function create(string $key, DataSelectionStrategy $dataSelectionStrategy, ?floatRange $selected) : ProductDataDoubleRangeFacet
    {
        $result = new ProductDataDoubleRangeFacet();
        $result->key = $key;
        $result->dataSelectionStrategy = $dataSelectionStrategy;
        $result->selected = $selected;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductDataDoubleRangeFacet
    {
        $result = floatProductDataRangeFacet::hydrateBase(new ProductDataDoubleRangeFacet(), $arr);
        return $result;
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
