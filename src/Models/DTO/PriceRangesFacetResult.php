<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

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
    function withExpandedRangeSize(?float $expandedRangeSize)
    {
        $this->expandedRangeSize = $expandedRangeSize;
        return $this;
    }
    function withSelected(?floatChainableRange ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    function withAvailable(?floatChainableRangeAvailableFacetValue ... $available)
    {
        $this->available = $available;
        return $this;
    }
    function withPriceSelectionStrategy(PriceSelectionStrategy $priceSelectionStrategy)
    {
        $this->priceSelectionStrategy = $priceSelectionStrategy;
        return $this;
    }
    function withField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
}
