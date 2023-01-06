<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ContentDataDoubleRangeFacet extends floatContentDataRangeFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ContentDataDoubleRangeFacet, Relewise.Client";
    public static function create() : ContentDataDoubleRangeFacet
    {
        $result = new ContentDataDoubleRangeFacet();
        return $result;
    }
    public static function hydrate(array $arr) : ContentDataDoubleRangeFacet
    {
        $result = floatContentDataRangeFacet::hydrateBase(new ContentDataDoubleRangeFacet(), $arr);
        return $result;
    }
    function withSelected(?floatRange $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function withKey(string $key)
    {
        $this->key = $key;
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
