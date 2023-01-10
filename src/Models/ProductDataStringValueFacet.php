<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductDataStringValueFacet extends stringProductDataValueFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ProductDataStringValueFacet, Relewise.Client";
    public static function create(DataSelectionStrategy $dataSelectionStrategy, string $key, ?array $selected, ?CollectionFilterType $collectionFilterType) : ProductDataStringValueFacet
    {
        $result = new ProductDataStringValueFacet();
        $result->dataSelectionStrategy = $dataSelectionStrategy;
        $result->key = $key;
        $result->selected = $selected;
        $result->collectionFilterType = $collectionFilterType;
        return $result;
    }
    public static function hydrate(array $arr) : ProductDataStringValueFacet
    {
        $result = stringProductDataValueFacet::hydrateBase(new ProductDataStringValueFacet(), $arr);
        return $result;
    }
    function setDataSelectionStrategy(DataSelectionStrategy $dataSelectionStrategy)
    {
        $this->dataSelectionStrategy = $dataSelectionStrategy;
        return $this;
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
    function setSelected(string ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function addToSelected(string $selected)
    {
        if (!isset($this->selected))
        {
            $this->selected = array();
        }
        array_push($this->selected, $selected);
        return $this;
    }
    function setField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
    function setSettings(?FacetSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
}
