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
    function withKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    function withCollectionFilterType(?CollectionFilterType $collectionFilterType)
    {
        $this->collectionFilterType = $collectionFilterType;
        return $this;
    }
    function withSelected(float ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function withAvailable(floatAvailableFacetValue ... $available)
    {
        $this->available = $available;
        return $this;
    }
    function withField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
}
