<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** a RelevanceModifier that can change the relevance of a Product depending on the list price falling within a specific Range. */
class ProductListPriceRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.ProductListPriceRelevanceModifier, Relewise.Client";
    /** The range of list prices that this RelevanceModifier will distinguish on. */
    public ?floatRange $range;
    /** The currency that is used to distinguish the price. */
    public ?Currency $currency;
    public float $multiplyWeightBy;
    /** Determines whether this RelevanceModifier should apply to all the Products that aren't contained within the specific Range instead. */
    public bool $negated;
    /** Creates <inheritdoc cref="T:Relewise.Client.Requests.RelevanceModifiers.ProductListPriceRelevanceModifier">            </inheritdoc> */
    public static function create(?floatRange $range, float $multiplyWeightBy = 1, ?Currency $currency = Null, bool $negated = false) : ProductListPriceRelevanceModifier
    {
        $result = new ProductListPriceRelevanceModifier();
        $result->range = $range;
        $result->multiplyWeightBy = $multiplyWeightBy;
        $result->currency = $currency;
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : ProductListPriceRelevanceModifier
    {
        $result = RelevanceModifier::hydrateBase(new ProductListPriceRelevanceModifier(), $arr);
        if (array_key_exists("range", $arr))
        {
            $result->range = floatRange::hydrate($arr["range"]);
        }
        if (array_key_exists("currency", $arr))
        {
            $result->currency = Currency::hydrate($arr["currency"]);
        }
        if (array_key_exists("multiplyWeightBy", $arr))
        {
            $result->multiplyWeightBy = $arr["multiplyWeightBy"];
        }
        if (array_key_exists("negated", $arr))
        {
            $result->negated = $arr["negated"];
        }
        return $result;
    }
    /**
     * Sets range to a new value.
     * @param ?floatRange $range new value.
     */
    function setRange(?floatRange $range)
    {
        $this->range = $range;
        return $this;
    }
    /**
     * Sets currency to a new value.
     * @param ?Currency $currency new value.
     */
    function setCurrency(?Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
    /**
     * Sets multiplyWeightBy to a new value.
     * @param float $multiplyWeightBy new value.
     */
    function setMultiplyWeightBy(float $multiplyWeightBy)
    {
        $this->multiplyWeightBy = $multiplyWeightBy;
        return $this;
    }
    /**
     * Sets negated to a new value.
     * @param bool $negated new value.
     */
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
    /**
     * Sets filters to a new value.
     * @param FilterCollection $filters new value.
     */
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
}
