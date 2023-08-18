<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductCategoryDataStringValueFacet extends stringProductCategoryDataValueFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ProductCategoryDataStringValueFacet, Relewise.Client";
    public static function create(string $key, ?array $selected, ?CollectionFilterType $collectionFilterType) : ProductCategoryDataStringValueFacet
    {
        $result = new ProductCategoryDataStringValueFacet();
        $result->key = $key;
        $result->selected = $selected;
        $result->collectionFilterType = $collectionFilterType;
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryDataStringValueFacet
    {
        $result = stringProductCategoryDataValueFacet::hydrateBase(new ProductCategoryDataStringValueFacet(), $arr);
        return $result;
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
    /**
     * Sets selected to a new value from an array.
     * @param ?string[] $selected new value.
     */
    function setSelectedFromArray(array $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    /**
     * Adds a new element to selected.
     * @param string $selected new element.
     */
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
