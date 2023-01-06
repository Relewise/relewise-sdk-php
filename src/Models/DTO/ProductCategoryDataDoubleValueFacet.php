<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductCategoryDataDoubleValueFacet extends floatProductCategoryDataValueFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ProductCategoryDataDoubleValueFacet, Relewise.Client";
    public static function create() : ProductCategoryDataDoubleValueFacet
    {
        $result = new ProductCategoryDataDoubleValueFacet();
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryDataDoubleValueFacet
    {
        $result = floatProductCategoryDataValueFacet::hydrateBase(new ProductCategoryDataDoubleValueFacet(), $arr);
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
