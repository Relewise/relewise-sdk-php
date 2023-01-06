<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class VariantSpecificationFacet extends stringValueFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.VariantSpecificationFacet, Relewise.Client";
    public string $key;
    public static function create(string $key, string ... $selected) : VariantSpecificationFacet
    {
        $result = new VariantSpecificationFacet();
        $result->key = $key;
        $result->selected = $selected;
        return $result;
    }
    public static function hydrate(array $arr) : VariantSpecificationFacet
    {
        $result = stringValueFacet::hydrateBase(new VariantSpecificationFacet(), $arr);
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        return $result;
    }
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    function setSelected(string ... $selected)
    {
        $this->selected = $selected;
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
