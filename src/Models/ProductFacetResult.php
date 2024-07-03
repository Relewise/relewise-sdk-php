<?php declare(strict_types=1);

namespace Relewise\Models;

use Relewise\FacetResultExtractable\ProductFacetResultExtractable;

class ProductFacetResult extends ProductFacetResultExtractable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ProductFacetResult, Relewise.Client";
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
    function setItems(FacetResult ... $items)
    {
        $this->items = $items;
        return $this;
    }
    /** @param FacetResult[] $items new value. */
    function setItemsFromArray(array $items)
    {
        $this->items = $items;
        return $this;
    }
    function addToItems(FacetResult $items)
    {
        if (!isset($this->items))
        {
            $this->items = array();
        }
        array_push($this->items, $items);
        return $this;
    }
}
