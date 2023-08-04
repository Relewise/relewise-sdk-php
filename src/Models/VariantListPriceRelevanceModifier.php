<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** a <see cref="T:Relewise.Client.Requests.RelevanceModifiers.RelevanceModifier"> that can change the relevance of a Variant depending on the list price falling within a specific <see cref="P:Relewise.Client.Requests.RelevanceModifiers.VariantListPriceRelevanceModifier.Range">.            </see></see> */
class VariantListPriceRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.VariantListPriceRelevanceModifier, Relewise.Client";
    public ?floatRange $range;
    public ?Currency $currency;
    public float $multiplyWeightBy;
    /** Determines whether this <see cref="T:Relewise.Client.Requests.RelevanceModifiers.RelevanceModifier"> should apply to all the Variants that aren't contained within the specific <see cref="P:Relewise.Client.Requests.RelevanceModifiers.VariantListPriceRelevanceModifier.Range"> instead.            </see></see> */
    public bool $negated;
    public static function create(?floatRange $range, float $multiplyWeightBy = 1, ?Currency $currency = Null, bool $negated = false) : VariantListPriceRelevanceModifier
    {
        $result = new VariantListPriceRelevanceModifier();
        $result->range = $range;
        $result->multiplyWeightBy = $multiplyWeightBy;
        $result->currency = $currency;
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : VariantListPriceRelevanceModifier
    {
        $result = RelevanceModifier::hydrateBase(new VariantListPriceRelevanceModifier(), $arr);
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
