<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductDataObjectFacet extends DataObjectFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ProductDataObjectFacet, Relewise.Client";
    public DataSelectionStrategy $dataSelectionStrategy;
    public static function create(DataSelectionStrategy $dataSelectionStrategy, string $key) : ProductDataObjectFacet
    {
        $result = new ProductDataObjectFacet();
        $result->dataSelectionStrategy = $dataSelectionStrategy;
        $result->key = $key;
        return $result;
    }
    public static function hydrate(array $arr) : ProductDataObjectFacet
    {
        $result = new ProductDataObjectFacet();
        if (array_key_exists("dataSelectionStrategy", $arr))
        {
            $result->dataSelectionStrategy = DataSelectionStrategy::from($arr["dataSelectionStrategy"]);
        }
        return $result;
    }
    /**
     * Sets dataSelectionStrategy to a new value.
     * @param DataSelectionStrategy $dataSelectionStrategy new value.
     */
    function setDataSelectionStrategy(DataSelectionStrategy $dataSelectionStrategy)
    {
        $this->dataSelectionStrategy = $dataSelectionStrategy;
        return $this;
    }
    /**
     * Sets key to a new value.
     * @param string $key new value.
     */
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    /**
     * Sets items to a new value.
     * @param Facet[] $items new value.
     */
    function setItems(Facet ... $items)
    {
        $this->items = $items;
        return $this;
    }
    /**
     * Sets items to a new value from an array.
     * @param Facet[] $items new value.
     */
    function setItemsFromArray(array $items)
    {
        $this->items = $items;
        return $this;
    }
    /**
     * Adds a new element to items.
     * @param Facet $items new element.
     */
    function addToItems(Facet $items)
    {
        if (!isset($this->items))
        {
            $this->items = array();
        }
        array_push($this->items, $items);
        return $this;
    }
    /**
     * Sets filter to a new value.
     * @param DataObjectFilter $filter new value.
     */
    function setFilter(DataObjectFilter $filter)
    {
        $this->filter = $filter;
        return $this;
    }
    /**
     * Sets field to a new value.
     * @param FacetingField $field new value.
     */
    function setField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
    /**
     * Sets settings to a new value.
     * @param ?FacetSettings $settings new value.
     */
    function setSettings(?FacetSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
}
