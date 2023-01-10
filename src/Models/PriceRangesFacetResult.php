<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class PriceRangesFacetResult extends FacetResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Result.PriceRangesFacetResult, Relewise.Client";
    public ?float $expandedRangeSize;
    public array $selected;
    public array $available;
    public PriceSelectionStrategy $priceSelectionStrategy;
    public static function create(FacetingField $field, PriceSelectionStrategy $priceSelectionStrategy, ?float $expandedRangeSize, array $selected, ?floatChainableRangeAvailableFacetValue ... $available) : PriceRangesFacetResult
    {
        $result = new PriceRangesFacetResult();
        $result->field = $field;
        $result->priceSelectionStrategy = $priceSelectionStrategy;
        $result->expandedRangeSize = $expandedRangeSize;
        $result->selected = $selected;
        $result->available = $available;
        return $result;
    }
    public static function hydrate(array $arr) : PriceRangesFacetResult
    {
        $result = FacetResult::hydrateBase(new PriceRangesFacetResult(), $arr);
        if (array_key_exists("expandedRangeSize", $arr))
        {
            $result->expandedRangeSize = $arr["expandedRangeSize"];
        }
        if (array_key_exists("selected", $arr))
        {
            $result->selected = array();
            foreach($arr["selected"] as &$value)
            {
                array_push($result->selected, floatChainableRange::hydrate($value));
            }
        }
        if (array_key_exists("available", $arr))
        {
            $result->available = array();
            foreach($arr["available"] as &$value)
            {
                array_push($result->available, floatChainableRangeAvailableFacetValue::hydrate($value));
            }
        }
        if (array_key_exists("priceSelectionStrategy", $arr))
        {
            $result->priceSelectionStrategy = PriceSelectionStrategy::from($arr["priceSelectionStrategy"]);
        }
        return $result;
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
    function addToSelected(?floatChainableRange $selected)
    {
        if (!isset($this->selected))
        {
            $this->selected = array();
        }
        array_push($this->selected, $selected);
        return $this;
    }
    function setAvailable(?floatChainableRangeAvailableFacetValue ... $available)
    {
        $this->available = $available;
        return $this;
    }
    function addToAvailable(?floatChainableRangeAvailableFacetValue $available)
    {
        if (!isset($this->available))
        {
            $this->available = array();
        }
        array_push($this->available, $available);
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
