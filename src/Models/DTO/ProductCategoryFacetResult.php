<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductCategoryFacetResult
{
    public array $items;
    public static function create() : ProductCategoryFacetResult
    {
        $result = new ProductCategoryFacetResult();
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryFacetResult
    {
        $result = new ProductCategoryFacetResult();
        if (array_key_exists("items", $arr))
        {
            $result->items = array();
            foreach($arr["items"] as &$value)
            {
                array_push($result->items, FacetResult::hydrate($value));
            }
        }
        return $result;
    }
    function withItems(FacetResult ... $items)
    {
        $this->items = $items;
        return $this;
    }
}
