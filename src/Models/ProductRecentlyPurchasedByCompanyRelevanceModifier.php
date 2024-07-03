<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

/** a RelevanceModifier that can change the relevance of a Product depending on whether the users company or parent company have purchased this product within some timespan. */
class ProductRecentlyPurchasedByCompanyRelevanceModifier extends RelevanceModifier implements JsonSerializable
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.ProductRecentlyPurchasedByCompanyRelevanceModifier, Relewise.Client";
    /** The start of the time period in which a product will be considered relevant to the user if purchased previously by any of the provided companies. */
    public ?DateTime $sinceUtc;
    /** The companies that should be evaluated in this modifier. */
    public array $companyIds;
    /** The weight that the Product will be multiplied with if it has been purchased in the past by any of the provided companies (since SinceUtc). */
    public float $ifPurchasedByCompanyMultiplyWeightBy;
    /** The weight that the Product will be multiplied with if it has not been purchased in the past by any of the provided companies (since SinceUtc). */
    public float $elseIfNotPurchasedByCompanyMultiplyWeightBy;
    /** The minutes since in which a product will be considered relevant to the user if bought previously by them. */
    public ?int $sinceMinutesAgo;
    public static function create(array $companyIds, float $ifPurchasedByCompanyMultiplyWeightBy = 1, float $elseIfNotPurchasedByCompanyMultiplyWeightBy = 1) : ProductRecentlyPurchasedByCompanyRelevanceModifier
    {
        $result = new ProductRecentlyPurchasedByCompanyRelevanceModifier();
        $result->companyIds = $companyIds;
        $result->ifPurchasedByCompanyMultiplyWeightBy = $ifPurchasedByCompanyMultiplyWeightBy;
        $result->elseIfNotPurchasedByCompanyMultiplyWeightBy = $elseIfNotPurchasedByCompanyMultiplyWeightBy;
        return $result;
    }
    public static function hydrate(array $arr) : ProductRecentlyPurchasedByCompanyRelevanceModifier
    {
        $result = RelevanceModifier::hydrateBase(new ProductRecentlyPurchasedByCompanyRelevanceModifier(), $arr);
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
        if (array_key_exists("ifPurchasedByCompanyMultiplyWeightBy", $arr))
        {
            $result->ifPurchasedByCompanyMultiplyWeightBy = $arr["ifPurchasedByCompanyMultiplyWeightBy"];
        }
        if (array_key_exists("elseIfNotPurchasedByCompanyMultiplyWeightBy", $arr))
        {
            $result->elseIfNotPurchasedByCompanyMultiplyWeightBy = $arr["elseIfNotPurchasedByCompanyMultiplyWeightBy"];
        }
        if (array_key_exists("sinceMinutesAgo", $arr))
        {
            $result->sinceMinutesAgo = $arr["sinceMinutesAgo"];
        }
        return $result;
    }
    /** The start of the time period in which a product will be considered relevant to the user if purchased previously by any of the provided companies. */
    function setSinceUtc(?DateTime $sinceUtc)
    {
        $this->sinceUtc = $sinceUtc;
        return $this;
    }
    /** The companies that should be evaluated in this modifier. */
    function setCompanyIds(string ... $companyIds)
    {
        $this->companyIds = $companyIds;
        return $this;
    }
    /**
     * The companies that should be evaluated in this modifier.
     * @param string[] $companyIds new value.
     */
    function setCompanyIdsFromArray(array $companyIds)
    {
        $this->companyIds = $companyIds;
        return $this;
    }
    /** The companies that should be evaluated in this modifier. */
    function addToCompanyIds(string $companyIds)
    {
        if (!isset($this->companyIds))
        {
            $this->companyIds = array();
        }
        array_push($this->companyIds, $companyIds);
        return $this;
    }
    /** The weight that the Product will be multiplied with if it has been purchased in the past by any of the provided companies (since SinceUtc). */
    function setIfPurchasedByCompanyMultiplyWeightBy(float $ifPurchasedByCompanyMultiplyWeightBy)
    {
        $this->ifPurchasedByCompanyMultiplyWeightBy = $ifPurchasedByCompanyMultiplyWeightBy;
        return $this;
    }
    /** The weight that the Product will be multiplied with if it has not been purchased in the past by any of the provided companies (since SinceUtc). */
    function setElseIfNotPurchasedByCompanyMultiplyWeightBy(float $elseIfNotPurchasedByCompanyMultiplyWeightBy)
    {
        $this->elseIfNotPurchasedByCompanyMultiplyWeightBy = $elseIfNotPurchasedByCompanyMultiplyWeightBy;
        return $this;
    }
    /** The minutes since in which a product will be considered relevant to the user if bought previously by them. */
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
        $result["typeDefinition"] = "Relewise.Client.Requests.RelevanceModifiers.ProductRecentlyPurchasedByCompanyRelevanceModifier, Relewise.Client";
        if (isset($this->sinceUtc))
        {
            $result["sinceUtc"] = $this->sinceUtc->format(DATE_ATOM);
        }
        if (isset($this->companyIds))
        {
            $result["companyIds"] = $this->companyIds;
        }
        if (isset($this->ifPurchasedByCompanyMultiplyWeightBy))
        {
            $result["ifPurchasedByCompanyMultiplyWeightBy"] = $this->ifPurchasedByCompanyMultiplyWeightBy;
        }
        if (isset($this->elseIfNotPurchasedByCompanyMultiplyWeightBy))
        {
            $result["elseIfNotPurchasedByCompanyMultiplyWeightBy"] = $this->elseIfNotPurchasedByCompanyMultiplyWeightBy;
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
