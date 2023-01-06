<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class BrandFacet extends stringValueFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.BrandFacet, Relewise.Client";
    public static function create() : BrandFacet
    {
        $result = new BrandFacet();
        return $result;
    }
    public static function hydrate(array $arr) : BrandFacet
    {
        $result = stringValueFacet::hydrateBase(new BrandFacet(), $arr);
        return $result;
    }
    function withSelected(string ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function withField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
    function withSettings(?FacetSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
}
