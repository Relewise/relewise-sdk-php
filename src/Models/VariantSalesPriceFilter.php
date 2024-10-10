<?php declare(strict_types=1);

namespace Relewise\Models;

class VariantSalesPriceFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.VariantSalesPriceFilter, Relewise.Client";
    public ?floatRange $range;
    public ?Currency $currency;
    
    public static function create(?floatRange $range, ?Currency $currency = Null, bool $negated = false) : VariantSalesPriceFilter
    {
        $result = new VariantSalesPriceFilter();
        $result->range = $range;
        $result->currency = $currency;
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : VariantSalesPriceFilter
    {
        $result = Filter::hydrateBase(new VariantSalesPriceFilter(), $arr);
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
