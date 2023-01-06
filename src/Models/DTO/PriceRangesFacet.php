<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class PriceRangesFacet extends Facet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.PriceRangesFacet, Relewise.Client";
    public ?array $predefinedRanges;
    public ?float $expandedRangeSize;
    public ?array $selected;
    public PriceSelectionStrategy $priceSelectionStrategy;
    public static function create(FacetingField $field, PriceSelectionStrategy $priceSelectionStrategy, ?array $predefinedRanges, ?float $expandedRangeSize, ?floatChainableRange ... $selected) : PriceRangesFacet
    {
        $result = new PriceRangesFacet();
        $result->field = $field;
        $result->priceSelectionStrategy = $priceSelectionStrategy;
        $result->predefinedRanges = $predefinedRanges;
        $result->expandedRangeSize = $expandedRangeSize;
        $result->selected = $selected;
        return $result;
    }
    public static function hydrate(array $arr) : PriceRangesFacet
    {
        $result = Facet::hydrateBase(new PriceRangesFacet(), $arr);
        if (array_key_exists("predefinedRanges", $arr))
        {
            $result->predefinedRanges = array();
            foreach($arr["predefinedRanges"] as &$value)
            {
                array_push($result->predefinedRanges, floatChainableRange::hydrate($value));
            }
        }
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
        if (array_key_exists("priceSelectionStrategy", $arr))
        {
            $result->priceSelectionStrategy = PriceSelectionStrategy::from($arr["priceSelectionStrategy"]);
        }
        return $result;
    }
    function withPredefinedRanges(?floatChainableRange ... $predefinedRanges)
    {
        $this->predefinedRanges = $predefinedRanges;
        return $this;
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
    function withSettings(?FacetSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
}
