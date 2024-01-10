<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** a Filter that can filter on the products recently purchased by some companies. */
class ProductRecentlyPurchasedByCompanyFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ProductRecentlyPurchasedByCompanyFilter, Relewise.Client";
    /** The time from which a Product should have been bought by any of the companies to be included by the filter. */
    public DateTime $sinceUtc;
    /** The companies that should be evaluated in this filter. */
    public array $companyIds;
    public static function create(DateTime $sinceUtc, bool $negated = false) : ProductRecentlyPurchasedByCompanyFilter
    {
        $result = new ProductRecentlyPurchasedByCompanyFilter();
        $result->sinceUtc = $sinceUtc;
        $result->negated = $negated;
        return $result;
    }
    public static function hydrate(array $arr) : ProductRecentlyPurchasedByCompanyFilter
    {
        $result = Filter::hydrateBase(new ProductRecentlyPurchasedByCompanyFilter(), $arr);
        if (array_key_exists("sinceUtc", $arr))
        {
            $result->sinceUtc = new DateTime($arr["sinceUtc"]);
        }
        if (array_key_exists("companyIds", $arr))
        {
            $result->companyIds = array();
            foreach($arr["companyIds"] as &$value)
            {
                array_push($result->companyIds, $value);
            }
        }
        return $result;
    }
    /** The time from which a Product should have been bought by any of the companies to be included by the filter. */
    function setSinceUtc(DateTime $sinceUtc)
    {
        $this->sinceUtc = $sinceUtc;
        return $this;
    }
    /** The companies that should be evaluated in this filter. */
    function setCompanyIds(string ... $companyIds)
    {
        $this->companyIds = $companyIds;
        return $this;
    }
    /**
     * The companies that should be evaluated in this filter.
     * @param string[] $companyIds new value.
     */
    function setCompanyIdsFromArray(array $companyIds)
    {
        $this->companyIds = $companyIds;
        return $this;
    }
    /** The companies that should be evaluated in this filter. */
    function addToCompanyIds(string $companyIds)
    {
        if (!isset($this->companyIds))
        {
            $this->companyIds = array();
        }
        array_push($this->companyIds, $companyIds);
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
