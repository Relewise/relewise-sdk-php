<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductDataBooleanValueFacet extends boolProductDataValueFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ProductDataBooleanValueFacet, Relewise.Client";
    public static function create() : ProductDataBooleanValueFacet
    {
        $result = new ProductDataBooleanValueFacet();
        return $result;
    }
    public static function hydrate(array $arr) : ProductDataBooleanValueFacet
    {
        $result = boolProductDataValueFacet::hydrateBase(new ProductDataBooleanValueFacet(), $arr);
        return $result;
    }
    function withDataSelectionStrategy(DataSelectionStrategy $dataSelectionStrategy)
    {
        $this->dataSelectionStrategy = $dataSelectionStrategy;
        return $this;
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
