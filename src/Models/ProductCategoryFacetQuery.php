<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductCategoryFacetQuery
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ProductCategoryFacetQuery, Relewise.Client";
    public array $items;
    public static function create() : ProductCategoryFacetQuery
    {
        $result = new ProductCategoryFacetQuery();
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryFacetQuery
    {
        $result = new ProductCategoryFacetQuery();
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
    /**
     * Sets items to a new value.
     * @param Facet[] $items new value.
     */
    function setItems(Facet ... $items)
    {
        $this->items = $items;
        return $this;
    }
    /**
     * Sets items to a new value from an array.
     * @param Facet[] $items new value.
     */
    function setItemsFromArray(array $items)
    {
        $this->items = $items;
        return $this;
    }
    /**
     * Adds a new element to items.
     * @param Facet $items new element.
     */
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
