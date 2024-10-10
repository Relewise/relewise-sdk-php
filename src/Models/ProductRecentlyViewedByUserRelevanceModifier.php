<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

/** a RelevanceModifier that can change the relevance of a Product depending on whether they have viewed this product within some timespan. */
class ProductRecentlyViewedByUserRelevanceModifier extends RecentlyViewedByUserRelevanceModifier implements JsonSerializable
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.ProductRecentlyViewedByUserRelevanceModifier, Relewise.Client";
    /**
     * Creates a RelevanceModifier that can change the relevance of a Product depending on whether they have viewed this product within some timespan.
     * @param DateTime $sinceUtc The start of the time period in which an entity will be considered relevant to the user if viewed previously by them.
     * @param float $ifPreviouslyViewedByUserMultiplyWeightBy The weight that the entity will be multiplied with if it has been viewed in the past by the user (since SinceUtc).
     * @param float $ifNotPreviouslyViewedByUserMultiplyWeightBy The weight that the entity will be multiplied with if it has not been viewed in the past by the user (since SinceUtc).
     */
    public static function create(DateTime $sinceUtc, float $ifPreviouslyViewedByUserMultiplyWeightBy = 1, float $ifNotPreviouslyViewedByUserMultiplyWeightBy = 1) : ProductRecentlyViewedByUserRelevanceModifier
    {
        $result = new ProductRecentlyViewedByUserRelevanceModifier();
        $result->sinceUtc = $sinceUtc;
        $result->ifPreviouslyViewedByUserMultiplyWeightBy = $ifPreviouslyViewedByUserMultiplyWeightBy;
        $result->ifNotPreviouslyViewedByUserMultiplyWeightBy = $ifNotPreviouslyViewedByUserMultiplyWeightBy;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductRecentlyViewedByUserRelevanceModifier
    {
        $result = RecentlyViewedByUserRelevanceModifier::hydrateBase(new ProductRecentlyViewedByUserRelevanceModifier(), $arr);
        return $result;
    }
    
    function setSinceUtc(?DateTime $sinceUtc)
    {
        $this->sinceUtc = $sinceUtc;
        return $this;
    }
    
    function setIfPreviouslyViewedByUserMultiplyWeightBy(float $ifPreviouslyViewedByUserMultiplyWeightBy)
    {
        $this->ifPreviouslyViewedByUserMultiplyWeightBy = $ifPreviouslyViewedByUserMultiplyWeightBy;
        return $this;
    }
    
    function setIfNotPreviouslyViewedByUserMultiplyWeightBy(float $ifNotPreviouslyViewedByUserMultiplyWeightBy)
    {
        $this->ifNotPreviouslyViewedByUserMultiplyWeightBy = $ifNotPreviouslyViewedByUserMultiplyWeightBy;
        return $this;
    }
    
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
        if (isset($this->ifPreviouslyViewedByUserMultiplyWeightBy))
        {
            $result["ifPreviouslyViewedByUserMultiplyWeightBy"] = $this->ifPreviouslyViewedByUserMultiplyWeightBy;
        }
        if (isset($this->ifNotPreviouslyViewedByUserMultiplyWeightBy))
        {
            $result["ifNotPreviouslyViewedByUserMultiplyWeightBy"] = $this->ifNotPreviouslyViewedByUserMultiplyWeightBy;
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
