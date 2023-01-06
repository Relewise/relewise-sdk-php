<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ContentDataDoubleRangesFacetResult extends floatContentDataRangesFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ContentDataDoubleRangesFacetResult, Relewise.Client";
    public static function create() : ContentDataDoubleRangesFacetResult
    {
        $result = new ContentDataDoubleRangesFacetResult();
        return $result;
    }
    public static function hydrate(array $arr) : ContentDataDoubleRangesFacetResult
    {
        $result = floatContentDataRangesFacetResult::hydrateBase(new ContentDataDoubleRangesFacetResult(), $arr);
        return $result;
    }
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    function setExpandedRangeSize(?float $expandedRangeSize)
    {
        $this->expandedRangeSize = $expandedRangeSize;
        return $this;
    }
    function setSelected(?floatChainableRange ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function setAvailable(?floatChainableRangeAvailableFacetValue ... $available)
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
