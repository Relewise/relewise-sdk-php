<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductDataStringValueFacet extends stringProductDataValueFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ProductDataStringValueFacet, Relewise.Client";
    public static function create() : ProductDataStringValueFacet
    {
        $result = new ProductDataStringValueFacet();
        return $result;
    }
    public static function hydrate(array $arr) : ProductDataStringValueFacet
    {
        $result = stringProductDataValueFacet::hydrateBase(new ProductDataStringValueFacet(), $arr);
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
    function withSelected(string ... $selected)
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
