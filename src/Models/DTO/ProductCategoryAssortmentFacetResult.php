<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductCategoryAssortmentFacetResult extends AssortmentFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ProductCategoryAssortmentFacetResult, Relewise.Client";
    public static function create() : ProductCategoryAssortmentFacetResult
    {
        $result = new ProductCategoryAssortmentFacetResult();
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryAssortmentFacetResult
    {
        $result = AssortmentFacetResult::hydrateBase(new ProductCategoryAssortmentFacetResult(), $arr);
        return $result;
    }
    function withAssortmentFilterType(AssortmentFilterType $assortmentFilterType)
    {
        $this->assortmentFilterType = $assortmentFilterType;
        return $this;
    }
    function withSelected(int ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function withAvailable(intAvailableFacetValue ... $available)
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
