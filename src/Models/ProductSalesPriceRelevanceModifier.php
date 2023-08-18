<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** a RelevanceModifier that can change the relevance of a Product depending on the sales price falling within a specific Range. */
class ProductSalesPriceRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.ProductSalesPriceRelevanceModifier, Relewise.Client";
    /** The range of sales prices that this RelevanceModifier will distinguish on. */
    public ?floatRange $range;
    public ?Currency $currency;
    public float $multiplyWeightBy;
    /** Determines whether this RelevanceModifier should apply to all the Products that aren't contained within the specific Range instead. */
    public bool $negated;
    /** Creates <inheritdoc cref="T:Relewise.Client.Requests.RelevanceModifiers.ProductSalesPriceRelevanceModifier">            </inheritdoc> */
    public static function create(?floatRange $range, float $multiplyWeightBy = 1, ?Currency $currency = Null, bool $negated = false) : ProductSalesPriceRelevanceModifier
    {
        $result = new ProductSalesPriceRelevanceModifier();
        $result->range = $range;
        $result->multiplyWeightBy = $multiplyWeightBy;
        $result->currency = $currency;
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : ProductSalesPriceRelevanceModifier
    {
        $result = RelevanceModifier::hydrateBase(new ProductSalesPriceRelevanceModifier(), $arr);
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
    function setRange(?floatRange $range)
    {
        $this->range = $range;
        return $this;
    }
    function setCurrency(?Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
    function setMultiplyWeightBy(float $multiplyWeightBy)
    {
        $this->multiplyWeightBy = $multiplyWeightBy;
        return $this;
    }
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
}
