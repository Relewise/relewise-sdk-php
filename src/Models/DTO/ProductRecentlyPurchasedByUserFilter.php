<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductRecentlyPurchasedByUserFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ProductRecentlyPurchasedByUserFilter, Relewise.Client";
    public DateTime $sinceUtc;
    public static function create(DateTime $sinceUtc, bool $negated = false) : ProductRecentlyPurchasedByUserFilter
    {
        $result = new ProductRecentlyPurchasedByUserFilter();
        $result->sinceUtc = $sinceUtc;
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : ProductRecentlyPurchasedByUserFilter
    {
        $result = Filter::hydrateBase(new ProductRecentlyPurchasedByUserFilter(), $arr);
        if (array_key_exists("sinceUtc", $arr))
        {
            $result->sinceUtc = $arr["sinceUtc"];
        }
        return $result;
    }
    function withSinceUtc(DateTime $sinceUtc)
    {
        $this->sinceUtc = $sinceUtc;
        return $this;
    }
    function withNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
