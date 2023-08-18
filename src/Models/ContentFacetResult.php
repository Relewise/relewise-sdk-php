<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

use Relewise\FacetResultExtractable\ContentFacetResultExtractable;

class ContentFacetResult extends ContentFacetResultExtractable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ContentFacetResult, Relewise.Client";
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
    /**
     * Sets items to a new value from an array.
     * @param FacetResult[] $items new value.
     */
    function setItemsFromArray(array $items)
    {
        $this->items = $items;
        return $this;
    }
    /**
     * Adds a new element to items.
     * @param FacetResult $items new element.
     */
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
