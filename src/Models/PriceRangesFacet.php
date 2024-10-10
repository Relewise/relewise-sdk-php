<?php declare(strict_types=1);

namespace Relewise\Models;

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
    
    function setPredefinedRanges(?floatChainableRange ... $predefinedRanges)
    {
        $this->predefinedRanges = $predefinedRanges;
        return $this;
    }
    
    /** @param ??floatChainableRange[] $predefinedRanges new value. */
    function setPredefinedRangesFromArray(array $predefinedRanges)
    {
        $this->predefinedRanges = $predefinedRanges;
        return $this;
    }
    
    function addToPredefinedRanges(?floatChainableRange $predefinedRanges)
    {
        if (!isset($this->predefinedRanges))
        {
            $this->predefinedRanges = array();
        }
        array_push($this->predefinedRanges, $predefinedRanges);
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
    
    /** @param ??floatChainableRange[] $selected new value. */
    function setSelectedFromArray(array $selected)
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
    
    function setSettings(?FacetSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
}
