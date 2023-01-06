<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductCategoryAssortmentFacet extends AssortmentFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ProductCategoryAssortmentFacet, Relewise.Client";
    public static function create() : ProductCategoryAssortmentFacet
    {
        $result = new ProductCategoryAssortmentFacet();
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryAssortmentFacet
    {
        $result = AssortmentFacet::hydrateBase(new ProductCategoryAssortmentFacet(), $arr);
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
    function withField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
    function withSettings(?FacetSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
}
