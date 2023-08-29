<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class VariantListPriceFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.VariantListPriceFilter, Relewise.Client";
    public ?floatRange $range;
    public ?Currency $currency;
    public static function create(?floatRange $range, ?Currency $currency = Null, bool $negated = false) : VariantListPriceFilter
    {
        $result = new VariantListPriceFilter();
        $result->range = $range;
        $result->currency = $currency;
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : VariantListPriceFilter
    {
        $result = Filter::hydrateBase(new VariantListPriceFilter(), $arr);
        if (array_key_exists("range", $arr))
        {
            $result->range = floatRange::hydrate($arr["range"]);
        }
        if (array_key_exists("currency", $arr))
        {
            $result->currency = Currency::hydrate($arr["currency"]);
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
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
    function setSettings(?FilterSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
}
