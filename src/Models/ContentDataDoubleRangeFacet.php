<?php declare(strict_types=1);

namespace Relewise\Models;

class ContentDataDoubleRangeFacet extends floatContentDataRangeFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.ContentDataDoubleRangeFacet, Relewise.Client";
    public static function create(string $key, ?floatRange $selected) : ContentDataDoubleRangeFacet
    {
        $result = new ContentDataDoubleRangeFacet();
        $result->key = $key;
        $result->selected = $selected;
        return $result;
    }
    public static function hydrate(array $arr) : ContentDataDoubleRangeFacet
    {
        $result = floatContentDataRangeFacet::hydrateBase(new ContentDataDoubleRangeFacet(), $arr);
        return $result;
    }
    function setSelected(?floatRange $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function setKey(string $key)
    {
        $this->key = $key;
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
