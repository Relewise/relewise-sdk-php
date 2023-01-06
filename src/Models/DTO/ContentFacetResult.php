<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ContentFacetResult
{
    public array $items;
    public static function create() : ContentFacetResult
    {
        $result = new ContentFacetResult();
        return $result;
    }
    public static function hydrate(array $arr) : ContentFacetResult
    {
        $result = new ContentFacetResult();
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
    function setItems(FacetResult ... $items)
    {
        $this->items = $items;
        return $this;
    }
}
