<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

/** a RelevanceModifier that can change the relevance of a Product depending on whether the product has been viewed by any of the provided companies within the provided timespan. */
class ProductRecentlyViewedByCompanyRelevanceModifier extends RelevanceModifier implements JsonSerializable
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.ProductRecentlyViewedByCompanyRelevanceModifier, Relewise.Client";
    /** The start of the time period in which a product will be considered relevant to the user if viewed previously by any of the provided companies. */
    public ?DateTime $sinceUtc;
    /** The list of companies. */
    public array $companyIds;
    /** The weight that the Product will be multiplied with if it has been viewed in the past by any of the provided companies (since SinceUtc). */
    public float $ifViewedByCompanyMultiplyWeightBy;
    /** The weight that the Product will be multiplied with if it has not been viewed in the past by the users company (since SinceUtc). */
    public float $elseIfNotViewedByCompanyMultiplyWeightBy;
    /** The minutes since in which a product will be considered relevant to the user if viewed previously by them. */
    public ?int $sinceMinutesAgo;
    public static function create(array $companyIds, float $ifViewedByCompanyMultiplyWeightBy = 1, float $elseIfNotViewedByCompanyMultiplyWeightBy = 1) : ProductRecentlyViewedByCompanyRelevanceModifier
    {
        $result = new ProductRecentlyViewedByCompanyRelevanceModifier();
        $result->companyIds = $companyIds;
        $result->ifViewedByCompanyMultiplyWeightBy = $ifViewedByCompanyMultiplyWeightBy;
        $result->elseIfNotViewedByCompanyMultiplyWeightBy = $elseIfNotViewedByCompanyMultiplyWeightBy;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductRecentlyViewedByCompanyRelevanceModifier
    {
        $result = RelevanceModifier::hydrateBase(new ProductRecentlyViewedByCompanyRelevanceModifier(), $arr);
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
        if (array_key_exists("ifViewedByCompanyMultiplyWeightBy", $arr))
        {
            $result->ifViewedByCompanyMultiplyWeightBy = $arr["ifViewedByCompanyMultiplyWeightBy"];
        }
        if (array_key_exists("elseIfNotViewedByCompanyMultiplyWeightBy", $arr))
        {
            $result->elseIfNotViewedByCompanyMultiplyWeightBy = $arr["elseIfNotViewedByCompanyMultiplyWeightBy"];
        }
        if (array_key_exists("sinceMinutesAgo", $arr))
        {
            $result->sinceMinutesAgo = $arr["sinceMinutesAgo"];
        }
        return $result;
    }
    
    /** The start of the time period in which a product will be considered relevant to the user if viewed previously by any of the provided companies. */
    function setSinceUtc(?DateTime $sinceUtc)
    {
        $this->sinceUtc = $sinceUtc;
        return $this;
    }
    
    /** The list of companies. */
    function setCompanyIds(string ... $companyIds)
    {
        $this->companyIds = $companyIds;
        return $this;
    }
    
    /**
     * The list of companies.
     * @param string[] $companyIds new value.
     */
    function setCompanyIdsFromArray(array $companyIds)
    {
        $this->companyIds = $companyIds;
        return $this;
    }
    
    /** The list of companies. */
    function addToCompanyIds(string $companyIds)
    {
        if (!isset($this->companyIds))
        {
            $this->companyIds = array();
        }
        array_push($this->companyIds, $companyIds);
        return $this;
    }
    
    /** The weight that the Product will be multiplied with if it has been viewed in the past by any of the provided companies (since SinceUtc). */
    function setIfViewedByCompanyMultiplyWeightBy(float $ifViewedByCompanyMultiplyWeightBy)
    {
        $this->ifViewedByCompanyMultiplyWeightBy = $ifViewedByCompanyMultiplyWeightBy;
        return $this;
    }
    
    /** The weight that the Product will be multiplied with if it has not been viewed in the past by the users company (since SinceUtc). */
    function setElseIfNotViewedByCompanyMultiplyWeightBy(float $elseIfNotViewedByCompanyMultiplyWeightBy)
    {
        $this->elseIfNotViewedByCompanyMultiplyWeightBy = $elseIfNotViewedByCompanyMultiplyWeightBy;
        return $this;
    }
    
    /** The minutes since in which a product will be considered relevant to the user if viewed previously by them. */
    function setSinceMinutesAgo(?int $sinceMinutesAgo)
    {
        $this->sinceMinutesAgo = $sinceMinutesAgo;
        return $this;
    }
    
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
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
        if (isset($this->ifViewedByCompanyMultiplyWeightBy))
        {
            $result["ifViewedByCompanyMultiplyWeightBy"] = $this->ifViewedByCompanyMultiplyWeightBy;
        }
        if (isset($this->elseIfNotViewedByCompanyMultiplyWeightBy))
        {
            $result["elseIfNotViewedByCompanyMultiplyWeightBy"] = $this->elseIfNotViewedByCompanyMultiplyWeightBy;
        }
        if (isset($this->sinceMinutesAgo))
        {
            $result["sinceMinutesAgo"] = $this->sinceMinutesAgo;
        }
        if (isset($this->filters))
        {
            $result["filters"] = $this->filters;
        }
        return $result;
    }
}
