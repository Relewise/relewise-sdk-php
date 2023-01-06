<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductFacetResult
{
    public array $items;
    public static function create() : ProductFacetResult
    {
        $result = new ProductFacetResult();
        return $result;
    }
    public static function hydrate(array $arr) : ProductFacetResult
    {
        $result = new ProductFacetResult();
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