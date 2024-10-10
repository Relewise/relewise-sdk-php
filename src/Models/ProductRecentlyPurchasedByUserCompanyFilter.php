<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

/** a Filter that can filter on the products recently purchased by the Company associated to the User used in this query. */
class ProductRecentlyPurchasedByUserCompanyFilter extends Filter implements JsonSerializable
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ProductRecentlyPurchasedByUserCompanyFilter, Relewise.Client";
    
    /** The time from which a Product should have been bought by any of the companies to be included by the filter. */
    public ?DateTime $sinceUtc;
    /** The time in minutes from which a Product should have been viewed by any of the companies to be included by the filter. */
    public ?int $sinceMinutesAgo;
    /**
     * Creates a Filter that can filter on the products recently purchased by the Company associated to the User used in this query.
     * @param DateTime $sinceUtc The time from which a Product should have been bought by any of the companies to be included by the filter.
     * @param bool $negated Defines whether the Filter should exclude the matching entities instead of including the matching entities.
     */
    public static function create(DateTime $sinceUtc, bool $negated = false) : ProductRecentlyPurchasedByUserCompanyFilter
    {
        $result = new ProductRecentlyPurchasedByUserCompanyFilter();
        $result->sinceUtc = $sinceUtc;
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
    
    public function jsonSerialize(): mixed
    {
        $result = array();
        $result["typeDefinition"] = $this->typeDefinition;
        if (isset($this->sinceUtc))
        {
            $result["sinceUtc"] = $this->sinceUtc->format(DATE_ATOM);
        }
        if (isset($this->sinceMinutesAgo))
        {
            $result["sinceMinutesAgo"] = $this->sinceMinutesAgo;
        }
        if (isset($this->negated))
        {
            $result["negated"] = $this->negated;
        }
        if (isset($this->settings))
        {
            $result["settings"] = $this->settings;
        }
        return $result;
    }
}
