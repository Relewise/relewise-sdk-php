<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductRecentlyViewedByUserFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ProductRecentlyViewedByUserFilter, Relewise.Client";
    public DateTime $sinceUtc;
    public static function create(DateTime $sinceUtc, bool $negated = false) : ProductRecentlyViewedByUserFilter
    {
        $result = new ProductRecentlyViewedByUserFilter();
        $result->sinceUtc = $sinceUtc;
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : ProductRecentlyViewedByUserFilter
    {
        $result = Filter::hydrateBase(new ProductRecentlyViewedByUserFilter(), $arr);
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
}
