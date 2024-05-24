<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** a Filter that can filter on the products recently purchased by the Company associated to the User used in this query. */
class ProductRecentlyPurchasedByUserCompanyFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ProductRecentlyPurchasedByUserCompanyFilter, Relewise.Client";
    /** The time from which a Product should have been bought by any of the companies to be included by the filter. */
    public ?DateTime $sinceUtc;
    /** The time in minutes from which a Product should have been viewed by any of the companies to be included by the filter. */
    public ?int $sinceMinutesAgo;
    public static function create(bool $negated = false) : ProductRecentlyPurchasedByUserCompanyFilter
    {
        $result = new ProductRecentlyPurchasedByUserCompanyFilter();
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : ProductRecentlyPurchasedByUserCompanyFilter
    {
        $result = Filter::hydrateBase(new ProductRecentlyPurchasedByUserCompanyFilter(), $arr);
        if (array_key_exists("sinceUtc", $arr))
        {
            $result->sinceUtc = new DateTime($arr["sinceUtc"]);
        }
        if (array_key_exists("sinceMinutesAgo", $arr))
        {
            $result->sinceMinutesAgo = $arr["sinceMinutesAgo"];
        }
        return $result;
    }
    /** The time from which a Product should have been bought by any of the companies to be included by the filter. */
    function setSinceUtc(?DateTime $sinceUtc)
    {
        $this->sinceUtc = $sinceUtc;
        return $this;
    }
    /** The time in minutes from which a Product should have been viewed by any of the companies to be included by the filter. */
    function setSinceMinutesAgo(?int $sinceMinutesAgo)
    {
        $this->sinceMinutesAgo = $sinceMinutesAgo;
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
