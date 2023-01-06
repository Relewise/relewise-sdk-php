<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductCategoryFacetQuery
{
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
    function withItems(Facet ... $items)
    {
        $this->items = $items;
        return $this;
    }
}
