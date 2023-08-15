<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductAssortmentFacet extends AssortmentFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ProductAssortmentFacet, Relewise.Client";
    public AssortmentSelectionStrategy $assortmentSelectionStrategy;
    public static function create(AssortmentSelectionStrategy $assortmentSelectionStrategy, AssortmentFilterType $assortmentFilterType, int ... $selected) : ProductAssortmentFacet
    {
        $result = new ProductAssortmentFacet();
        $result->assortmentSelectionStrategy = $assortmentSelectionStrategy;
        $result->assortmentFilterType = $assortmentFilterType;
        $result->selected = $selected;
        return $result;
    }
    public static function hydrate(array $arr) : ProductAssortmentFacet
    {
        $result = AssortmentFacet::hydrateBase(new ProductAssortmentFacet(), $arr);
        if (array_key_exists("assortmentSelectionStrategy", $arr))
        {
            $result->assortmentSelectionStrategy = AssortmentSelectionStrategy::from($arr["assortmentSelectionStrategy"]);
        }
        return $result;
    }
    /**
     * Sets assortmentSelectionStrategy to a new value.
     * @param AssortmentSelectionStrategy $assortmentSelectionStrategy new value.
     */
    function setAssortmentSelectionStrategy(AssortmentSelectionStrategy $assortmentSelectionStrategy)
    {
        $this->assortmentSelectionStrategy = $assortmentSelectionStrategy;
        return $this;
    }
    /**
     * Sets assortmentFilterType to a new value.
     * @param AssortmentFilterType $assortmentFilterType new value.
     */
    function setAssortmentFilterType(AssortmentFilterType $assortmentFilterType)
    {
        $this->assortmentFilterType = $assortmentFilterType;
        return $this;
    }
    /**
     * Sets selected to a new value.
     * @param ?int[] $selected new value.
     */
    function setSelected(int ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    /**
     * Sets selected to a new value from an array.
     * @param ?int[] $selected new value.
     */
    function setSelectedFromArray(array $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    /**
     * Adds a new element to selected.
     * @param int $selected new element.
     */
    function addToSelected(int $selected)
    {
        if (!isset($this->selected))
        {
            $this->selected = array();
        }
        array_push($this->selected, $selected);
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
