<?php declare(strict_types=1);

namespace Relewise\Models;

/** A RelevanceModifier that multiplies the relevance of content based on the current user's engagement data. */
class ContentEngagementRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.ContentEngagementRelevanceModifier, Relewise.Client";
    /** The sentiment that must match for MultiplyWeightBy to apply. */
    public ?ContentEngagementDataSentimentKind $sentiment;
    /** The favorite flag that must match for MultiplyWeightBy to apply. */
    public ?bool $isFavorite;
    /** The multiplier applied when the modifier condition is satisfied (or when it is not satisfied if Negated is true). */
    public float $multiplyWeightBy;
    /** When set to true, the multiplier applies when the condition is not satisfied instead of when it matches. */
    public bool $negated;
    
    /**
     * Creates a new ContentEngagementRelevanceModifier.
     * @param ?ContentEngagementDataSentimentKind $sentiment The sentiment that must match for MultiplyWeightBy to apply.
     * @param ?bool $isFavorite The favorite flag that must match for MultiplyWeightBy to apply.
     * @param float $multiplyWeightBy The multiplier applied when the modifier condition is satisfied (or when it is not satisfied if Negated is true).
     * @param bool $negated When set to true, the multiplier applies when the condition is not satisfied instead of when it matches.
     */
    public static function create(?ContentEngagementDataSentimentKind $sentiment, ?bool $isFavorite, float $multiplyWeightBy = 1, bool $negated = false) : ContentEngagementRelevanceModifier
    {
        $result = new ContentEngagementRelevanceModifier();
        $result->sentiment = $sentiment;
        $result->isFavorite = $isFavorite;
        $result->multiplyWeightBy = $multiplyWeightBy;
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentEngagementRelevanceModifier
    {
        $result = RelevanceModifier::hydrateBase(new ContentEngagementRelevanceModifier(), $arr);
        if (array_key_exists("sentiment", $arr))
        {
            $result->sentiment = ContentEngagementDataSentimentKind::from($arr["sentiment"]);
        }
        if (array_key_exists("isFavorite", $arr))
        {
            $result->isFavorite = $arr["isFavorite"];
        }
        if (array_key_exists("multiplyWeightBy", $arr))
        {
            $result->multiplyWeightBy = $arr["multiplyWeightBy"];
        }
        if (array_key_exists("negated", $arr))
        {
            $result->negated = $arr["negated"];
        }
        return $result;
    }
    
    /** The sentiment that must match for MultiplyWeightBy to apply. */
    function setSentiment(?ContentEngagementDataSentimentKind $sentiment)
    {
        $this->sentiment = $sentiment;
        return $this;
    }
    
    /** The favorite flag that must match for MultiplyWeightBy to apply. */
    function setIsFavorite(?bool $isFavorite)
    {
        $this->isFavorite = $isFavorite;
        return $this;
    }
    
    /** The multiplier applied when the modifier condition is satisfied (or when it is not satisfied if Negated is true). */
    function setMultiplyWeightBy(float $multiplyWeightBy)
    {
        $this->multiplyWeightBy = $multiplyWeightBy;
        return $this;
    }
    
    /** When set to true, the multiplier applies when the condition is not satisfied instead of when it matches. */
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
    
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
}
