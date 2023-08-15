<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductSalesPriceFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ProductSalesPriceFilter, Relewise.Client";
    public ?floatRange $range;
    public ?Currency $currency;
    public static function create(?floatRange $range, ?Currency $currency = Null, bool $negated = false) : ProductSalesPriceFilter
    {
        $result = new ProductSalesPriceFilter();
        $result->range = $range;
        $result->currency = $currency;
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : ProductSalesPriceFilter
    {
        $result = Filter::hydrateBase(new ProductSalesPriceFilter(), $arr);
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
     * Sets negated to a new value.
     * @param bool $negated new value.
     */
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
