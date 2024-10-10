<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductCategoryDataDoubleValueFacet extends floatProductCategoryDataValueFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ProductCategoryDataDoubleValueFacet, Relewise.Client";
    public static function create(string $key, ?array $selected, ?CollectionFilterType $collectionFilterType) : ProductCategoryDataDoubleValueFacet
    {
        $result = new ProductCategoryDataDoubleValueFacet();
        $result->key = $key;
        $result->selected = $selected;
        $result->collectionFilterType = $collectionFilterType;
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryDataDoubleValueFacet
    {
        $result = floatProductCategoryDataValueFacet::hydrateBase(new ProductCategoryDataDoubleValueFacet(), $arr);
        return $result;
    }
    
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    
    function setCollectionFilterType(?CollectionFilterType $collectionFilterType)
    {
        $this->collectionFilterType = $collectionFilterType;
        return $this;
    }
    
    function setSelected(float ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    
    /** @param ?float[] $selected new value. */
    function setSelectedFromArray(array $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    
    function addToSelected(float $selected)
    {
        if (!isset($this->selected))
        {
            $this->selected = array();
        }
        array_push($this->selected, $selected);
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
