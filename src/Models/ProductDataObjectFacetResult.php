<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductDataObjectFacetResult extends DataObjectFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ProductDataObjectFacetResult, Relewise.Client";
    public DataSelectionStrategy $dataSelectionStrategy;
    
    public static function create(string $key, array $items, DataObjectFilter $filter, FacetEvaluationMode $evaluationMode) : ProductDataObjectFacetResult
    {
        $result = new ProductDataObjectFacetResult();
        $result->key = $key;
        $result->items = $items;
        $result->filter = $filter;
        $result->evaluationMode = $evaluationMode;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductDataObjectFacetResult
    {
        $result = new ProductDataObjectFacetResult();
        if (array_key_exists("dataSelectionStrategy", $arr))
        {
            $result->dataSelectionStrategy = DataSelectionStrategy::from($arr["dataSelectionStrategy"]);
        }
        return $result;
    }
    
    function setDataSelectionStrategy(DataSelectionStrategy $dataSelectionStrategy)
    {
        $this->dataSelectionStrategy = $dataSelectionStrategy;
        return $this;
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
