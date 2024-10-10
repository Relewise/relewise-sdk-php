<?php declare(strict_types=1);

namespace Relewise\Models;

class ContentFacetQuery extends FacetQuery
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ContentFacetQuery, Relewise.Client";
    
    public array $items;
    public static function create() : ContentFacetQuery
    {
        $result = new ContentFacetQuery();
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentFacetQuery
    {
        $result = FacetQuery::hydrateBase(new ContentFacetQuery(), $arr);
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
