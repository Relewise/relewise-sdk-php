<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ContentDataDoubleRangeFacetResult extends floatContentDataRangeFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ContentDataDoubleRangeFacetResult, Relewise.Client";
    public static function create(string $key, ?floatRange $selected, ?floatRangeAvailableFacetValue $available) : ContentDataDoubleRangeFacetResult
    {
        $result = new ContentDataDoubleRangeFacetResult();
        $result->key = $key;
        $result->selected = $selected;
        $result->available = $available;
        return $result;
    }
    public static function hydrate(array $arr) : ContentDataDoubleRangeFacetResult
    {
        $result = floatContentDataRangeFacetResult::hydrateBase(new ContentDataDoubleRangeFacetResult(), $arr);
        return $result;
    }
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    function setSelected(?floatRange $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function setAvailable(?floatRangeAvailableFacetValue $available)
    {
        $this->available = $available;
        return $this;
    }
    function setField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
}
