<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

/** a RelevanceModifier that can change the relevance of a Product depending on whether the users company or parent company have viewed this product within the provided timespan. */
class ProductRecentlyViewedByUserCompanyRelevanceModifier extends RelevanceModifier implements JsonSerializable
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.ProductRecentlyViewedByUserCompanyRelevanceModifier, Relewise.Client";
    
    /** The start of the time period in which a product will be considered relevant to the user if viewed previously by their company. */
    public ?DateTime $sinceUtc;
    /** The weight that the Product will be multiplied with if it has been viewed in the past by the users company (since SinceUtc). */
    public float $ifViewedByUserCompanyMultiplyWeightBy;
    /** The weight that the Product will be multiplied with if it has been viewed in the past by the users parent company (since SinceUtc). */
    public float $elseIfViewedByUserParentCompanyMultiplyWeightBy;
    /** The weight that the Product will be multiplied with if it has not been viewed in the past by the users parent company (since SinceUtc). */
    public float $elseIfNotViewedByEitherCompanyMultiplyWeightBy;
    /** The minutes since in which a product will be considered relevant to the user if viewed previously by them. */
    public ?int $sinceMinutesAgo;
    
    public static function create(float $ifViewedByUserCompanyMultiplyWeightBy = 1, float $elseIfViewedByUserParentCompanyMultiplyWeightBy = 1, float $elseIfNotViewedByEitherCompanyMultiplyWeightBy = 1) : ProductRecentlyViewedByUserCompanyRelevanceModifier
    {
        $result = new ProductRecentlyViewedByUserCompanyRelevanceModifier();
        $result->ifViewedByUserCompanyMultiplyWeightBy = $ifViewedByUserCompanyMultiplyWeightBy;
        $result->elseIfViewedByUserParentCompanyMultiplyWeightBy = $elseIfViewedByUserParentCompanyMultiplyWeightBy;
        $result->elseIfNotViewedByEitherCompanyMultiplyWeightBy = $elseIfNotViewedByEitherCompanyMultiplyWeightBy;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductRecentlyViewedByUserCompanyRelevanceModifier
    {
        $result = RelevanceModifier::hydrateBase(new ProductRecentlyViewedByUserCompanyRelevanceModifier(), $arr);
        if (array_key_exists("sinceUtc", $arr))
        {
            $result->sinceUtc = new DateTime($arr["sinceUtc"]);
        }
        if (array_key_exists("ifViewedByUserCompanyMultiplyWeightBy", $arr))
        {
            $result->ifViewedByUserCompanyMultiplyWeightBy = $arr["ifViewedByUserCompanyMultiplyWeightBy"];
        }
        if (array_key_exists("elseIfViewedByUserParentCompanyMultiplyWeightBy", $arr))
        {
            $result->elseIfViewedByUserParentCompanyMultiplyWeightBy = $arr["elseIfViewedByUserParentCompanyMultiplyWeightBy"];
        }
        if (array_key_exists("elseIfNotViewedByEitherCompanyMultiplyWeightBy", $arr))
        {
            $result->elseIfNotViewedByEitherCompanyMultiplyWeightBy = $arr["elseIfNotViewedByEitherCompanyMultiplyWeightBy"];
        }
        if (array_key_exists("sinceMinutesAgo", $arr))
        {
            $result->sinceMinutesAgo = $arr["sinceMinutesAgo"];
        }
        return $result;
    }
    
    /** The start of the time period in which a product will be considered relevant to the user if viewed previously by their company. */
    function setSinceUtc(?DateTime $sinceUtc)
    {
        $this->sinceUtc = $sinceUtc;
        return $this;
    }
    
    /** The weight that the Product will be multiplied with if it has been viewed in the past by the users company (since SinceUtc). */
    function setIfViewedByUserCompanyMultiplyWeightBy(float $ifViewedByUserCompanyMultiplyWeightBy)
    {
        $this->ifViewedByUserCompanyMultiplyWeightBy = $ifViewedByUserCompanyMultiplyWeightBy;
        return $this;
    }
    
    /** The weight that the Product will be multiplied with if it has been viewed in the past by the users parent company (since SinceUtc). */
    function setElseIfViewedByUserParentCompanyMultiplyWeightBy(float $elseIfViewedByUserParentCompanyMultiplyWeightBy)
    {
        $this->elseIfViewedByUserParentCompanyMultiplyWeightBy = $elseIfViewedByUserParentCompanyMultiplyWeightBy;
        return $this;
    }
    
    /** The weight that the Product will be multiplied with if it has not been viewed in the past by the users parent company (since SinceUtc). */
    function setElseIfNotViewedByEitherCompanyMultiplyWeightBy(float $elseIfNotViewedByEitherCompanyMultiplyWeightBy)
    {
        $this->elseIfNotViewedByEitherCompanyMultiplyWeightBy = $elseIfNotViewedByEitherCompanyMultiplyWeightBy;
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
        if (isset($this->ifViewedByUserCompanyMultiplyWeightBy))
        {
            $result["ifViewedByUserCompanyMultiplyWeightBy"] = $this->ifViewedByUserCompanyMultiplyWeightBy;
        }
        if (isset($this->elseIfViewedByUserParentCompanyMultiplyWeightBy))
        {
            $result["elseIfViewedByUserParentCompanyMultiplyWeightBy"] = $this->elseIfViewedByUserParentCompanyMultiplyWeightBy;
        }
        if (isset($this->elseIfNotViewedByEitherCompanyMultiplyWeightBy))
        {
            $result["elseIfNotViewedByEitherCompanyMultiplyWeightBy"] = $this->elseIfNotViewedByEitherCompanyMultiplyWeightBy;
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
