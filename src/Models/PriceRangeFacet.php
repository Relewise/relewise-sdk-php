<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class PriceRangeFacet extends Facet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.PriceRangeFacet, Relewise.Client";
    public ?floatRange $selected;
    public PriceSelectionStrategy $priceSelectionStrategy;
    public static function create(FacetingField $field, PriceSelectionStrategy $priceSelectionStrategy, ?floatRange $selected) : PriceRangeFacet
    {
        $result = new PriceRangeFacet();
        $result->field = $field;
        $result->priceSelectionStrategy = $priceSelectionStrategy;
        $result->selected = $selected;
        return $result;
    }
    public static function hydrate(array $arr) : PriceRangeFacet
    {
        $result = Facet::hydrateBase(new PriceRangeFacet(), $arr);
        if (array_key_exists("selected", $arr))
        {
            $result->selected = floatRange::hydrate($arr["selected"]);
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
