<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductFacetQuery
{
    public array $items;
    public static function create() : ProductFacetQuery
    {
        $result = new ProductFacetQuery();
        return $result;
    }
    public static function hydrate(array $arr) : ProductFacetQuery
    {
        $result = new ProductFacetQuery();
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
