<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductDataDoubleValueFacet extends floatProductDataValueFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ProductDataDoubleValueFacet, Relewise.Client";
    public static function create(DataSelectionStrategy $dataSelectionStrategy, string $key, ?array $selected, ?CollectionFilterType $collectionFilterType) : ProductDataDoubleValueFacet
    {
        $result = new ProductDataDoubleValueFacet();
        $result->dataSelectionStrategy = $dataSelectionStrategy;
        $result->key = $key;
        $result->selected = $selected;
        $result->collectionFilterType = $collectionFilterType;
        return $result;
    }
    public static function hydrate(array $arr) : ProductDataDoubleValueFacet
    {
        $result = floatProductDataValueFacet::hydrateBase(new ProductDataDoubleValueFacet(), $arr);
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
    function setSelected(float ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function setSelectedFromArray(array $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function addToSelected(float $selected)
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
