<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class UserFavoriteProductRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.UserFavoriteProductRelevanceModifier, Relewise.Client";
    public int $sinceMinutesAgo;
    public float $numberOfPurchasesWeight;
    public float $mostRecentPurchaseWeight;
    public float $ifNotPurchasedBaseWeight;
    public static function create(float $numberOfPurchasesWeight = 1, float $mostRecentPurchaseWeight = 1, float $ifNotPurchasedBaseWeight = 1) : UserFavoriteProductRelevanceModifier
    {
        $result = new UserFavoriteProductRelevanceModifier();
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
    function setSinceMinutesAgo(int $sinceMinutesAgo)
    {
        $this->sinceMinutesAgo = $sinceMinutesAgo;
        return $this;
    }
    function setNumberOfPurchasesWeight(float $numberOfPurchasesWeight)
    {
        $this->numberOfPurchasesWeight = $numberOfPurchasesWeight;
        return $this;
    }
    function setMostRecentPurchaseWeight(float $mostRecentPurchaseWeight)
    {
        $this->mostRecentPurchaseWeight = $mostRecentPurchaseWeight;
        return $this;
    }
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
