<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

use Relewise\FacetResultExtractable\ProductCategoryFacetResultExtractable;

class ProductCategoryFacetResult extends ProductCategoryFacetResultExtractable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ProductCategoryFacetResult, Relewise.Client";
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
    function setItems(FacetResult ... $items)
    {
        $this->items = $items;
        return $this;
    }
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
