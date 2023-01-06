<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ContentDataDoubleRangeFacetResult extends floatContentDataRangeFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ContentDataDoubleRangeFacetResult, Relewise.Client";
    public static function create() : ContentDataDoubleRangeFacetResult
    {
        $result = new ContentDataDoubleRangeFacetResult();
        return $result;
    }
    public static function hydrate(array $arr) : ContentDataDoubleRangeFacetResult
    {
        $result = floatContentDataRangeFacetResult::hydrateBase(new ContentDataDoubleRangeFacetResult(), $arr);
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
