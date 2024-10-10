<?php declare(strict_types=1);

namespace Relewise\Models;

class DataObjectDoubleRangeFacet extends floatDataObjectRangeFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.DataObjectDoubleRangeFacet, Relewise.Client";
    public static function create(string $key, ?floatRange $selected) : DataObjectDoubleRangeFacet
    {
        $result = new DataObjectDoubleRangeFacet();
        $result->key = $key;
        $result->selected = $selected;
        return $result;
    }
    public static function hydrate(array $arr) : DataObjectDoubleRangeFacet
    {
        $result = floatDataObjectRangeFacet::hydrateBase(new DataObjectDoubleRangeFacet(), $arr);
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
