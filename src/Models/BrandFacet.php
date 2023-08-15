<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class BrandFacet extends stringValueFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.BrandFacet, Relewise.Client";
    public static function create(string ... $selectedIds) : BrandFacet
    {
        $result = new BrandFacet();
        $result->selected = $selectedIds;
        return $result;
    }
    public static function hydrate(array $arr) : BrandFacet
    {
        $result = stringValueFacet::hydrateBase(new BrandFacet(), $arr);
        return $result;
    }
    /**
     * Sets selected to a new value.
     * @param ?string[] $selected new value.
     */
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
