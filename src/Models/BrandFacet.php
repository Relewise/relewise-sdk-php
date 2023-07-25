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
    function setSelected(string ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function setSelectedFromArray(array $selected)
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
