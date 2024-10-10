<?php declare(strict_types=1);

namespace Relewise\Models;

/** @deprecated Use ProductDataDoubleValueFacet instead */
class ProductDataIntegerValueFacet extends intProductDataValueFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ProductDataIntegerValueFacet, Relewise.Client";
    
    public static function create(DataSelectionStrategy $dataSelectionStrategy, string $key, ?array $selected, ?CollectionFilterType $collectionFilterType) : ProductDataIntegerValueFacet
    {
        $result = new ProductDataIntegerValueFacet();
        $result->dataSelectionStrategy = $dataSelectionStrategy;
        $result->key = $key;
        $result->selected = $selected;
        $result->collectionFilterType = $collectionFilterType;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductDataIntegerValueFacet
    {
        $result = intProductDataValueFacet::hydrateBase(new ProductDataIntegerValueFacet(), $arr);
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
    
    function setSelected(int ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    
    /** @param ?int[] $selected new value. */
    function setSelectedFromArray(array $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    
    function addToSelected(int $selected)
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
