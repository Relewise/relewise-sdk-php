<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ContentAssortmentFacetResult extends AssortmentFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.ContentAssortmentFacetResult, Relewise.Client";
    public static function create() : ContentAssortmentFacetResult
    {
        $result = new ContentAssortmentFacetResult();
        return $result;
    }
    public static function hydrate(array $arr) : ContentAssortmentFacetResult
    {
        $result = AssortmentFacetResult::hydrateBase(new ContentAssortmentFacetResult(), $arr);
        return $result;
    }
    function setAssortmentFilterType(AssortmentFilterType $assortmentFilterType)
    {
        $this->assortmentFilterType = $assortmentFilterType;
        return $this;
    }
    function setSelected(int ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function setAvailable(intAvailableFacetValue ... $available)
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
