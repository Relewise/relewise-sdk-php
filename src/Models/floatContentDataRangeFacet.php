<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class floatContentDataRangeFacet extends floatDataRangeFacet
{
    public string $typeDefinition = "";
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ContentDataDoubleRangeFacet, Relewise.Client")
        {
            return ContentDataDoubleRangeFacet::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = floatDataRangeFacet::hydrateBase($result, $arr);
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
