<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductDataDoubleRangeFacet extends floatProductDataRangeFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ProductDataDoubleRangeFacet, Relewise.Client";
    public static function create(string $key, DataSelectionStrategy $dataSelectionStrategy, ?floatRange $selected) : ProductDataDoubleRangeFacet
    {
        $result = new ProductDataDoubleRangeFacet();
        $result->key = $key;
        $result->dataSelectionStrategy = $dataSelectionStrategy;
        $result->selected = $selected;
        return $result;
    }
    public static function hydrate(array $arr) : ProductDataDoubleRangeFacet
    {
        $result = floatProductDataRangeFacet::hydrateBase(new ProductDataDoubleRangeFacet(), $arr);
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
     * Sets selected to a new value.
     * @param ?floatRange $selected new value.
     */
    function setSelected(?floatRange $selected)
    {
        $this->selected = $selected;
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
