<?php declare(strict_types=1);

namespace Relewise\Models;

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
    /**
     * Sets predefinedRanges to a new value.
     * @param ??floatChainableRange[] $predefinedRanges new value.
     */
    function setPredefinedRanges(?floatChainableRange ... $predefinedRanges)
    {
        $this->predefinedRanges = $predefinedRanges;
        return $this;
    }
    /**
     * Sets predefinedRanges to a new value from an array.
     * @param ??floatChainableRange[] $predefinedRanges new value.
     */
    function setPredefinedRangesFromArray(array $predefinedRanges)
    {
        $this->predefinedRanges = $predefinedRanges;
        return $this;
    }
    /**
     * Adds a new element to predefinedRanges.
     * @param ?floatChainableRange $predefinedRanges new element.
     */
    function addToPredefinedRanges(?floatChainableRange $predefinedRanges)
    {
        if (!isset($this->predefinedRanges))
        {
            $this->predefinedRanges = array();
        }
        array_push($this->predefinedRanges, $predefinedRanges);
        return $this;
    }
    /**
     * Sets expandedRangeSize to a new value.
     * @param ?float $expandedRangeSize new value.
     */
    function setExpandedRangeSize(?float $expandedRangeSize)
    {
        $this->expandedRangeSize = $expandedRangeSize;
        return $this;
    }
    /**
     * Sets selected to a new value.
     * @param ??floatChainableRange[] $selected new value.
     */
    function setSelected(?floatChainableRange ... $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    /**
     * Sets selected to a new value from an array.
     * @param ??floatChainableRange[] $selected new value.
     */
    function setSelectedFromArray(array $selected)
    {
        $this->selected = $selected;
        return $this;
    }
    /**
     * Adds a new element to selected.
     * @param ?floatChainableRange $selected new element.
     */
    function addToSelected(?floatChainableRange $selected)
    {
        if (!isset($this->selected))
        {
            $this->selected = array();
        }
        array_push($this->selected, $selected);
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
    /**
     * Sets settings to a new value.
     * @param ?FacetSettings $settings new value.
     */
    function setSettings(?FacetSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
}
