<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductDataObjectFacet extends DataObjectFacet
{
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
    function setItems(Facet ... $items)
    {
        $this->items = $items;
        return $this;
    }
    function setFilter(DataObjectFilter $filter)
    {
        $this->filter = $filter;
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
