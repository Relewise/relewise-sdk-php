<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductCategoryDataObjectFacet extends DataObjectFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ProductCategoryDataObjectFacet, Relewise.Client";
    public static function create(string $key) : ProductCategoryDataObjectFacet
    {
        $result = new ProductCategoryDataObjectFacet();
        $result->key = $key;
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryDataObjectFacet
    {
        $result = new ProductCategoryDataObjectFacet();
        return $result;
    }
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    function setItems(Facet ... $items)
    {
        $this->items = $items;
        return $this;
    }
    function setItemsFromArray(array $items)
    {
        $this->items = $items;
        return $this;
    }
    function addToItems(Facet $items)
    {
        if (!isset($this->items))
        {
            $this->items = array();
        }
        array_push($this->items, $items);
        return $this;
    }
    function setFilter(DataObjectFilter $filter)
    {
        $this->filter = $filter;
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
