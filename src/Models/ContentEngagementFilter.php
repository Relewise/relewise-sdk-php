<?php declare(strict_types=1);

namespace Relewise\Models;

/** Filters content results by previously tracked engagement signals such as sentiment or favorites. */
class ContentEngagementFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.ContentEngagementFilter, Relewise.Client";
    /** Specifies the sentiment that must have been recorded for the content. */
    public ?ContentEngagementDataSentimentKind $sentiment;
    /** Specifies whether the content must be marked as a favorite by the user. */
    public ?bool $isFavorite;
    
    public static function create(?ContentEngagementDataSentimentKind $sentiment, ?bool $isFavorite, bool $negated = false) : ContentEngagementFilter
    {
        $result = new ContentEngagementFilter();
        $result->sentiment = $sentiment;
        $result->isFavorite = $isFavorite;
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentEngagementFilter
    {
        $result = Filter::hydrateBase(new ContentEngagementFilter(), $arr);
        if (array_key_exists("sentiment", $arr))
        {
            $result->sentiment = ContentEngagementDataSentimentKind::from($arr["sentiment"]);
        }
        if (array_key_exists("isFavorite", $arr))
        {
            $result->isFavorite = $arr["isFavorite"];
        }
        return $result;
    }
    
    /** Specifies the sentiment that must have been recorded for the content. */
    function setSentiment(?ContentEngagementDataSentimentKind $sentiment)
    {
        $this->sentiment = $sentiment;
        return $this;
    }
    
    /** Specifies whether the content must be marked as a favorite by the user. */
    function setIsFavorite(?bool $isFavorite)
    {
        $this->isFavorite = $isFavorite;
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
