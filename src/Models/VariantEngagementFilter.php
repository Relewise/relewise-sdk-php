<?php declare(strict_types=1);

namespace Relewise\Models;

/** Filters variant results by previously tracked engagement signals such as sentiment or favorites. */
class VariantEngagementFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.VariantEngagementFilter, Relewise.Client";
    /** Specifies the sentiment that must have been recorded for the variant. */
    public ?ProductEngagementDataSentimentKind $sentiment;
    /** Specifies whether the variant must be marked as a favorite by the user. */
    public ?bool $isFavorite;
    
    public static function create(?ProductEngagementDataSentimentKind $sentiment, ?bool $isFavorite, bool $negated = false) : VariantEngagementFilter
    {
        $result = new VariantEngagementFilter();
        $result->sentiment = $sentiment;
        $result->isFavorite = $isFavorite;
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : VariantEngagementFilter
    {
        $result = Filter::hydrateBase(new VariantEngagementFilter(), $arr);
        if (array_key_exists("sentiment", $arr))
        {
            $result->sentiment = ProductEngagementDataSentimentKind::from($arr["sentiment"]);
        }
        if (array_key_exists("isFavorite", $arr))
        {
            $result->isFavorite = $arr["isFavorite"];
        }
        return $result;
    }
    
    /** Specifies the sentiment that must have been recorded for the variant. */
    function setSentiment(?ProductEngagementDataSentimentKind $sentiment)
    {
        $this->sentiment = $sentiment;
        return $this;
    }
    
    /** Specifies whether the variant must be marked as a favorite by the user. */
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
