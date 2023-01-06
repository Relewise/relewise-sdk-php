<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductCategoryDataBooleanValueFacetResult extends boolProductCategoryDataValueFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ProductCategoryDataBooleanValueFacetResult, Relewise.Client";
    public static function create() : ProductCategoryDataBooleanValueFacetResult
    {
        $result = new ProductCategoryDataBooleanValueFacetResult();
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryDataBooleanValueFacetResult
    {
        $result = boolProductCategoryDataValueFacetResult::hydrateBase(new ProductCategoryDataBooleanValueFacetResult(), $arr);
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
    function withSelected(bool ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function withAvailable(boolAvailableFacetValue ... $available)
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
