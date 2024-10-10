<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class floatRangeFacetResult extends FacetResult
{
    public string $typeDefinition = "";
    
    public ?floatRange $selected;
    public ?floatRangeAvailableFacetValue $available;
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Result.ContentDataDoubleRangeFacetResult, Relewise.Client")
        {
            return ContentDataDoubleRangeFacetResult::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Result.DataObjectDoubleRangeFacetResult, Relewise.Client")
        {
            return DataObjectDoubleRangeFacetResult::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Result.ProductCategoryDataDoubleRangeFacetResult, Relewise.Client")
        {
            return ProductCategoryDataDoubleRangeFacetResult::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Result.ProductDataDoubleRangeFacetResult, Relewise.Client")
        {
            return ProductDataDoubleRangeFacetResult::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = FacetResult::hydrateBase($result, $arr);
        if (array_key_exists("selected", $arr))
        {
            $result->selected = floatRange::hydrate($arr["selected"]);
        }
        if (array_key_exists("available", $arr))
        {
            $result->available = floatRangeAvailableFacetValue::hydrate($arr["available"]);
        }
        return $result;
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
