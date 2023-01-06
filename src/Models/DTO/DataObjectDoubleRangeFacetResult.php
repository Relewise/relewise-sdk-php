<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class DataObjectDoubleRangeFacetResult extends floatDataObjectRangeFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.DataObjectDoubleRangeFacetResult, Relewise.Client";
    public static function create() : DataObjectDoubleRangeFacetResult
    {
        $result = new DataObjectDoubleRangeFacetResult();
        return $result;
    }
    public static function hydrate(array $arr) : DataObjectDoubleRangeFacetResult
    {
        $result = floatDataObjectRangeFacetResult::hydrateBase(new DataObjectDoubleRangeFacetResult(), $arr);
        return $result;
    }
    function withKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    function withSelected(?floatRange $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function withAvailable(?floatRangeAvailableFacetValue $available)
    {
        $this->available = $available;
        return $this;
    }
    function withField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
}