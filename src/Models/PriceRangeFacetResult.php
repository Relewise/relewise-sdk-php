<?php declare(strict_types=1);

namespace Relewise\Models;

class PriceRangeFacetResult extends FacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.PriceRangeFacetResult, Relewise.Client";
    public ?floatRange $selected;
    public floatRangeAvailableFacetValue $available;
    public PriceSelectionStrategy $priceSelectionStrategy;
    public static function create(FacetingField $field, PriceSelectionStrategy $priceSelectionStrategy, ?floatRange $selected, floatRangeAvailableFacetValue $available) : PriceRangeFacetResult
    {
        $result = new PriceRangeFacetResult();
        $result->field = $field;
        $result->priceSelectionStrategy = $priceSelectionStrategy;
        $result->selected = $selected;
        $result->available = $available;
        return $result;
    }
    public static function hydrate(array $arr) : PriceRangeFacetResult
    {
        $result = FacetResult::hydrateBase(new PriceRangeFacetResult(), $arr);
        if (array_key_exists("selected", $arr))
        {
            $result->selected = floatRange::hydrate($arr["selected"]);
        }
        if (array_key_exists("available", $arr))
        {
            $result->available = floatRangeAvailableFacetValue::hydrate($arr["available"]);
        }
        if (array_key_exists("priceSelectionStrategy", $arr))
        {
            $result->priceSelectionStrategy = PriceSelectionStrategy::from($arr["priceSelectionStrategy"]);
        }
        return $result;
    }
    
    function setSelected(?floatRange $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    
    function setAvailable(floatRangeAvailableFacetValue $available)
    {
        $this->available = $available;
        return $this;
    }
    
    function setPriceSelectionStrategy(PriceSelectionStrategy $priceSelectionStrategy)
    {
        $this->priceSelectionStrategy = $priceSelectionStrategy;
        return $this;
    }
    
    function setField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
}
