<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ContentAssortmentFacet extends AssortmentFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ContentAssortmentFacet, Relewise.Client";
    public static function create() : ContentAssortmentFacet
    {
        $result = new ContentAssortmentFacet();
        return $result;
    }
    public static function hydrate(array $arr) : ContentAssortmentFacet
    {
        $result = AssortmentFacet::hydrateBase(new ContentAssortmentFacet(), $arr);
        return $result;
    }
    function withAssortmentFilterType(AssortmentFilterType $assortmentFilterType)
    {
        $this->assortmentFilterType = $assortmentFilterType;
        return $this;
    }
    function withSelected(int ... $selected)
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
