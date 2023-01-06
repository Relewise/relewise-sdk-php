<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductCategoryDataDoubleValueFacetResult extends floatProductCategoryDataValueFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ProductCategoryDataDoubleValueFacetResult, Relewise.Client";
    public static function create() : ProductCategoryDataDoubleValueFacetResult
    {
        $result = new ProductCategoryDataDoubleValueFacetResult();
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
    function setAvailable(floatAvailableFacetValue ... $available)
    {
        $this->available = $available;
        return $this;
    }
    function setField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
}
