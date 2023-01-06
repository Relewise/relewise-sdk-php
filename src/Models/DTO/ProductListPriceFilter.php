<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductListPriceFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ProductListPriceFilter, Relewise.Client";
    public ?floatRange $range;
    public ?Currency $currency;
    public static function create(?floatRange $range, ?Currency $currency, bool $negated = false) : ProductListPriceFilter
    {
        $result = new ProductListPriceFilter();
        $result->range = $range;
        $result->currency = $currency;
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : ProductListPriceFilter
    {
        $result = Filter::hydrateBase(new ProductListPriceFilter(), $arr);
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
    function withRange(?floatRange $range)
    {
        $this->range = $range;
        return $this;
    }
    function withCurrency(?Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
    function withNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
