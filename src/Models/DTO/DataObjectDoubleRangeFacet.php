<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class DataObjectDoubleRangeFacet extends floatDataObjectRangeFacet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.DataObjectDoubleRangeFacet, Relewise.Client";
    public static function create() : DataObjectDoubleRangeFacet
    {
        $result = new DataObjectDoubleRangeFacet();
        return $result;
    }
    public static function hydrate(array $arr) : DataObjectDoubleRangeFacet
    {
        $result = floatDataObjectRangeFacet::hydrateBase(new DataObjectDoubleRangeFacet(), $arr);
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