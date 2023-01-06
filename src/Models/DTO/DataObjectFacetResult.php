<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class DataObjectFacetResult extends FacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.DataObjectFacetResult, Relewise.Client";
    public string $key;
    public array $items;
    public DataObjectFilter $filter;
    public static function create(string $key, array $items, DataObjectFilter $filter) : DataObjectFacetResult
    {
        $result = new DataObjectFacetResult();
        $result->key = $key;
        $result->items = $items;
        $result->filter = $filter;
        return $result;
    }
    public static function hydrate(array $arr) : DataObjectFacetResult
    {
        $result = FacetResult::hydrateBase(new DataObjectFacetResult(), $arr);
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        if (array_key_exists("items", $arr))
        {
            $result->items = array();
            foreach($arr["items"] as &$value)
            {
                array_push($result->items, FacetResult::hydrate($value));
            }
        }
        if (array_key_exists("filter", $arr))
        {
            $result->filter = DataObjectFilter::hydrate($arr["filter"]);
        }
        return $result;
    }
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    function setItems(FacetResult ... $items)
    {
        $this->items = $items;
        return $this;
    }
    function setFilter(DataObjectFilter $filter)
    {
        $this->filter = $filter;
        return $this;
    }
    function setField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
}
