<?php declare(strict_types=1);

namespace Relewise\Models;

class ContentDataObjectFacetResult extends DataObjectFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ContentDataObjectFacetResult, Relewise.Client";
    public static function create(string $key, array $items, DataObjectFilter $filter, FacetEvaluationMode $evaluationMode) : ContentDataObjectFacetResult
    {
        $result = new ContentDataObjectFacetResult();
        $result->key = $key;
        $result->items = $items;
        $result->filter = $filter;
        $result->evaluationMode = $evaluationMode;
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentDataObjectFacetResult
    {
        $result = new ContentDataObjectFacetResult();
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
        if (array_key_exists("evaluationMode", $arr))
        {
            $result->evaluationMode = FacetEvaluationMode::from($arr["evaluationMode"]);
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
    
    function setFilter(DataObjectFilter $filter)
    {
        $this->filter = $filter;
        return $this;
    }
    
    function setEvaluationMode(FacetEvaluationMode $evaluationMode)
    {
        $this->evaluationMode = $evaluationMode;
        return $this;
    }
    
    function setField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
}
