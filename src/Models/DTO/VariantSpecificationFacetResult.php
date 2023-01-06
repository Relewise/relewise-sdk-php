<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class VariantSpecificationFacetResult extends stringValueFacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.VariantSpecificationFacetResult, Relewise.Client";
    public string $key;
    public static function create(string $key, array $selected, stringAvailableFacetValue ... $available) : VariantSpecificationFacetResult
    {
        $result = new VariantSpecificationFacetResult();
        $result->key = $key;
        $result->selected = $selected;
        $result->available = $available;
        return $result;
    }
    public static function hydrate(array $arr) : VariantSpecificationFacetResult
    {
        $result = stringValueFacetResult::hydrateBase(new VariantSpecificationFacetResult(), $arr);
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
    function setAvailable(stringAvailableFacetValue ... $available)
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
