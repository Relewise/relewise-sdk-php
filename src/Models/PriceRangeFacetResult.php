<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

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
    /**
     * Sets selected to a new value.
     * @param ?floatRange $selected new value.
     */
    function setSelected(?floatRange $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    /**
     * Sets available to a new value.
     * @param floatRangeAvailableFacetValue $available new value.
     */
    function setAvailable(floatRangeAvailableFacetValue $available)
    {
        $this->available = $available;
        return $this;
    }
    /**
     * Sets priceSelectionStrategy to a new value.
     * @param PriceSelectionStrategy $priceSelectionStrategy new value.
     */
    function setPriceSelectionStrategy(PriceSelectionStrategy $priceSelectionStrategy)
    {
        $this->priceSelectionStrategy = $priceSelectionStrategy;
        return $this;
    }
    /**
     * Sets field to a new value.
     * @param FacetingField $field new value.
     */
    function setField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
}
