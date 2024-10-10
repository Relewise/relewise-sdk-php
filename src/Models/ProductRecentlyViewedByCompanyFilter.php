<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

/** a Filter that can filter on the products recently viewed by some companies. */
class ProductRecentlyViewedByCompanyFilter extends Filter implements JsonSerializable
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ProductRecentlyViewedByCompanyFilter, Relewise.Client";
    
    /** The time from which a Product should have been viewed by any of the companies to be included by the filter. */
    public ?DateTime $sinceUtc;
    /** The companies that should be evaluated in this filter. */
    public array $companyIds;
    /** The time in minutes from which a Product should have been viewed by any of the companies to be included by the filter. */
    public ?int $sinceMinutesAgo;
    public static function create(DateTime $sinceUtc, bool $negated = false) : ProductRecentlyViewedByCompanyFilter
    {
        $result = new ProductRecentlyViewedByCompanyFilter();
        $result->sinceUtc = $sinceUtc;
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductRecentlyViewedByCompanyFilter
    {
        $result = Filter::hydrateBase(new ProductRecentlyViewedByCompanyFilter(), $arr);
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
        if (array_key_exists("sinceMinutesAgo", $arr))
        {
            $result->sinceMinutesAgo = $arr["sinceMinutesAgo"];
        }
        return $result;
    }
    
    /** The time from which a Product should have been viewed by any of the companies to be included by the filter. */
    function setSinceUtc(?DateTime $sinceUtc)
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
        if (isset($this->companyIds))
        {
            $result["companyIds"] = $this->companyIds;
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
