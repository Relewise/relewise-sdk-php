<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

/** a RelevanceModifier that can change the relevance of a ContentCategory depending on whether they have viewed this content within some timespan. */
class ContentCategoryRecentlyViewedByUserRelevanceModifier extends RecentlyViewedByUserRelevanceModifier implements JsonSerializable
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.ContentCategoryRecentlyViewedByUserRelevanceModifier, Relewise.Client";
    public static function create(float $ifPreviouslyViewedByUserMultiplyWeightBy = 1, float $ifNotPreviouslyViewedByUserMultiplyWeightBy = 1) : ContentCategoryRecentlyViewedByUserRelevanceModifier
    {
        $result = new ContentCategoryRecentlyViewedByUserRelevanceModifier();
        $result->ifPreviouslyViewedByUserMultiplyWeightBy = $ifPreviouslyViewedByUserMultiplyWeightBy;
        $result->ifNotPreviouslyViewedByUserMultiplyWeightBy = $ifNotPreviouslyViewedByUserMultiplyWeightBy;
        return $result;
    }
    public static function hydrate(array $arr) : ContentCategoryRecentlyViewedByUserRelevanceModifier
    {
        $result = RecentlyViewedByUserRelevanceModifier::hydrateBase(new ContentCategoryRecentlyViewedByUserRelevanceModifier(), $arr);
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
