<?php declare(strict_types=1);

namespace Relewise\Models;

/** a RelevanceModifier that can change the relevance of a Product depending on whether a product has been bought within some interval of minutes SinceMinutesAgofrom now, which can define complex modifiers depending on the number of purchases and how long time there has passed since the last purchase. */
class UserFavoriteProductRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.UserFavoriteProductRelevanceModifier, Relewise.Client";
    /** The timespan in minutes up till now that a product should be considered relevant if it has been bought by the user. */
    public int $sinceMinutesAgo;
    /** The multiplier that decides how important the amount of times the product has been bought is. */
    public float $numberOfPurchasesWeight;
    /** The multiplier that decides how important the amount of times the product has been bought is. */
    public float $mostRecentPurchaseWeight;
    /** The multiplier that decides how important more recent purchases should */
    public float $ifNotPurchasedBaseWeight;
    /**
     * Creates a RelevanceModifier that can change the relevance of a Product depending on whether a product has been bought within some interval of minutes SinceMinutesAgofrom now, which can define complex modifiers depending on the number of purchases and how long time there has passed since the last purchase.
     * @param int $sinceMinutesAgo The timespan in minutes up till now that a product should be considered relevant if it has been bought by the user.
     * @param float $numberOfPurchasesWeight The multiplier that decides how important the amount of times the product has been bought is.
     * @param float $mostRecentPurchaseWeight The multiplier that decides how important the amount of times the product has been bought is.
     * @param float $ifNotPurchasedBaseWeight The multiplier that decides how important more recent purchases should
     */
    public static function create(int $sinceMinutesAgo, float $numberOfPurchasesWeight = 1, float $mostRecentPurchaseWeight = 1, float $ifNotPurchasedBaseWeight = 1) : UserFavoriteProductRelevanceModifier
    {
        $result = new UserFavoriteProductRelevanceModifier();
        $result->sinceMinutesAgo = $sinceMinutesAgo;
        $result->numberOfPurchasesWeight = $numberOfPurchasesWeight;
        $result->mostRecentPurchaseWeight = $mostRecentPurchaseWeight;
        $result->ifNotPurchasedBaseWeight = $ifNotPurchasedBaseWeight;
        return $result;
    }
    
    public static function hydrate(array $arr) : UserFavoriteProductRelevanceModifier
    {
        $result = RelevanceModifier::hydrateBase(new UserFavoriteProductRelevanceModifier(), $arr);
        if (array_key_exists("sinceMinutesAgo", $arr))
        {
            $result->sinceMinutesAgo = $arr["sinceMinutesAgo"];
        }
        if (array_key_exists("numberOfPurchasesWeight", $arr))
        {
            $result->numberOfPurchasesWeight = $arr["numberOfPurchasesWeight"];
        }
        if (array_key_exists("mostRecentPurchaseWeight", $arr))
        {
            $result->mostRecentPurchaseWeight = $arr["mostRecentPurchaseWeight"];
        }
        if (array_key_exists("ifNotPurchasedBaseWeight", $arr))
        {
            $result->ifNotPurchasedBaseWeight = $arr["ifNotPurchasedBaseWeight"];
        }
        return $result;
    }
    
    /** The timespan in minutes up till now that a product should be considered relevant if it has been bought by the user. */
    function setSinceMinutesAgo(int $sinceMinutesAgo)
    {
        $this->sinceMinutesAgo = $sinceMinutesAgo;
        return $this;
    }
    
    /** The multiplier that decides how important the amount of times the product has been bought is. */
    function setNumberOfPurchasesWeight(float $numberOfPurchasesWeight)
    {
        $this->numberOfPurchasesWeight = $numberOfPurchasesWeight;
        return $this;
    }
    
    /** The multiplier that decides how important the amount of times the product has been bought is. */
    function setMostRecentPurchaseWeight(float $mostRecentPurchaseWeight)
    {
        $this->mostRecentPurchaseWeight = $mostRecentPurchaseWeight;
        return $this;
    }
    
    /** The multiplier that decides how important more recent purchases should */
    function setIfNotPurchasedBaseWeight(float $ifNotPurchasedBaseWeight)
    {
        $this->ifNotPurchasedBaseWeight = $ifNotPurchasedBaseWeight;
        return $this;
    }
    
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
}
