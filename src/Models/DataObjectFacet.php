<?php declare(strict_types=1);

namespace Relewise\Models;

class DataObjectFacet extends Facet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.DataObjectFacet, Relewise.Client";
    
    public string $key;
    public array $items;
    public DataObjectFilter $filter;
    public static function create(string $key) : DataObjectFacet
    {
        $result = new DataObjectFacet();
        $result->key = $key;
        return $result;
    }
    
    public static function hydrate(array $arr) : DataObjectFacet
    {
        $result = Facet::hydrateBase(new DataObjectFacet(), $arr);
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        if (array_key_exists("items", $arr))
        {
            $result->items = array();
            foreach($arr["items"] as &$value)
            {
                array_push($result->items, Facet::hydrate($value));
            }
        }
        if (array_key_exists("filter", $arr))
        {
            $result->filter = DataObjectFilter::hydrate($arr["filter"]);
        }
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
    
    /** @param Facet[] $items new value. */
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
