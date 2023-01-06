<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class BrandFacetResult extends stringBrandNameAndIdResultValueFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.BrandFacetResult, Relewise.Client";
    public static function create() : BrandFacetResult
    {
        $result = new BrandFacetResult();
        return $result;
    }
    public static function hydrate(array $arr) : BrandFacetResult
    {
        $result = stringBrandNameAndIdResultValueFacetResult::hydrateBase(new BrandFacetResult(), $arr);
        return $result;
    }
    function withSelected(string ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function withAvailable(BrandNameAndIdResultAvailableFacetValue ... $available)
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
