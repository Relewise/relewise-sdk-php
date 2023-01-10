<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductCategoryDataDoubleValueFacetResult extends floatProductCategoryDataValueFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ProductCategoryDataDoubleValueFacetResult, Relewise.Client";
    public static function create(string $key, array $selected, ?CollectionFilterType $collectionFilterType, floatAvailableFacetValue ... $available) : ProductCategoryDataDoubleValueFacetResult
    {
        $result = new ProductCategoryDataDoubleValueFacetResult();
        $result->key = $key;
        $result->selected = $selected;
        $result->collectionFilterType = $collectionFilterType;
        $result->available = $available;
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryDataDoubleValueFacetResult
    {
        $result = floatProductCategoryDataValueFacetResult::hydrateBase(new ProductCategoryDataDoubleValueFacetResult(), $arr);
        return $result;
    }
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    function setCollectionFilterType(?CollectionFilterType $collectionFilterType)
    {
        $this->collectionFilterType = $collectionFilterType;
        return $this;
    }
    function setSelected(float ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function addToSelected(float $selected)
    {
        if (!isset($this->selected))
        {
            $this->selected = array();
        }
        array_push($this->selected, $selected);
        return $this;
    }
    function setAvailable(floatAvailableFacetValue ... $available)
    {
        $this->available = $available;
        return $this;
    }
    function addToAvailable(floatAvailableFacetValue $available)
    {
        if (!isset($this->available))
        {
            $this->available = array();
        }
        array_push($this->available, $available);
        return $this;
    }
    function setField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
}
