<?php declare(strict_types=1);

namespace Relewise\Models;

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
            $result->sinceUtc = new DateTime($arr["sinceUtc"]);
        }
        return $result;
    }
    function setSinceUtc(DateTime $sinceUtc)
    {
        $this->sinceUtc = $sinceUtc;
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
