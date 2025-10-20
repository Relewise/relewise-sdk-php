<?php declare(strict_types=1);

namespace Relewise\Models;

/** A RelevanceModifier that multiplies the relevance of a product based on the current user's engagement data (sentiment and/or favorite). */
class ProductEngagementRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.ProductEngagementRelevanceModifier, Relewise.Client";
    /** The sentiment that must match for MultiplyWeightBy to apply. */
    public ?ProductEngagementDataSentimentKind $sentiment;
    /** The favorite flag that must match for MultiplyWeightBy to apply. */
    public ?bool $isFavorite;
    /** The multiplier applied when the modifier condition is satisfied (or when it is not satisfied if Negated is true). */
    public float $multiplyWeightBy;
    /** When set to true, the multiplier applies when the condition is not satisfied instead of when it matches. */
    public bool $negated;
    
    /**
     * Creates a new ProductEngagementRelevanceModifier.
     * @param ?ProductEngagementDataSentimentKind $sentiment The sentiment that must match for MultiplyWeightBy to apply.
     * @param ?bool $isFavorite The favorite flag that must match for MultiplyWeightBy to apply.
     * @param float $multiplyWeightBy The multiplier applied when the modifier condition is satisfied (or when it is not satisfied if Negated is true).
     * @param bool $negated When set to true, the multiplier applies when the condition is not satisfied instead of when it matches.
     */
    public static function create(?ProductEngagementDataSentimentKind $sentiment, ?bool $isFavorite, float $multiplyWeightBy = 1, bool $negated = false) : ProductEngagementRelevanceModifier
    {
        $result = new ProductEngagementRelevanceModifier();
        $result->sentiment = $sentiment;
        $result->isFavorite = $isFavorite;
        $result->multiplyWeightBy = $multiplyWeightBy;
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductEngagementRelevanceModifier
    {
        $result = RelevanceModifier::hydrateBase(new ProductEngagementRelevanceModifier(), $arr);
        if (array_key_exists("sentiment", $arr))
        {
            $result->sentiment = ProductEngagementDataSentimentKind::from($arr["sentiment"]);
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
    function setSentiment(?ProductEngagementDataSentimentKind $sentiment)
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
