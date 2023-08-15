<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

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
