<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductFacetQuery extends FacetQuery
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ProductFacetQuery, Relewise.Client";
    public array $items;
    
    public static function create() : ProductFacetQuery
    {
        $result = new ProductFacetQuery();
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductFacetQuery
    {
        $result = FacetQuery::hydrateBase(new ProductFacetQuery(), $arr);
        if (array_key_exists("items", $arr))
        {
            $result->items = array();
            foreach($arr["items"] as &$value)
            {
                array_push($result->items, Facet::hydrate($value));
            }
        }
        return $result;
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
}
