<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class VariantSalesPriceRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.VariantSalesPriceRelevanceModifier, Relewise.Client";
    public ?floatRange $range;
    public Currency $currency;
    public float $multiplyWeightBy;
    public bool $negated;
    public static function create(?floatRange $range, float $multiplyWeightBy = 1, Currency $currency, bool $negated = false) : VariantSalesPriceRelevanceModifier
    {
        $result = new VariantSalesPriceRelevanceModifier();
        $result->range = $range;
        $result->multiplyWeightBy = $multiplyWeightBy;
        $result->currency = $currency;
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : VariantSalesPriceRelevanceModifier
    {
        $result = RelevanceModifier::hydrateBase(new VariantSalesPriceRelevanceModifier(), $arr);
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
    function withRange(?floatRange $range)
    {
        $this->range = $range;
        return $this;
    }
    function withCurrency(Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
    function withMultiplyWeightBy(float $multiplyWeightBy)
    {
        $this->multiplyWeightBy = $multiplyWeightBy;
        return $this;
    }
    function withNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
    function withFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
}
