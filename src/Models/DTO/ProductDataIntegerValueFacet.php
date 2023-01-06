<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductDataIntegerValueFacet extends intProductDataValueFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ProductDataIntegerValueFacet, Relewise.Client";
    public static function create() : ProductDataIntegerValueFacet
    {
        $result = new ProductDataIntegerValueFacet();
        return $result;
    }
    public static function hydrate(array $arr) : ProductDataIntegerValueFacet
    {
        $result = intProductDataValueFacet::hydrateBase(new ProductDataIntegerValueFacet(), $arr);
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
