<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductRecentlyPurchasedByUserRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.ProductRecentlyPurchasedByUserRelevanceModifier, Relewise.Client";
    public DateTime $sinceUtc;
    public float $ifPreviouslyPurchasedByUserMultiplyWeightBy;
    public float $ifNotPreviouslyPurchasedByUserMultiplyWeightBy;
    public static function create(DateTime $sinceUtc, float $ifPreviouslyPurchasedByUserMultiplyWeightBy = 1, float $ifNotPreviouslyPurchasedByUserMultiplyWeightBy = 1) : ProductRecentlyPurchasedByUserRelevanceModifier
    {
        $result = new ProductRecentlyPurchasedByUserRelevanceModifier();
        $result->sinceUtc = $sinceUtc;
        $result->ifPreviouslyPurchasedByUserMultiplyWeightBy = $ifPreviouslyPurchasedByUserMultiplyWeightBy;
        $result->ifNotPreviouslyPurchasedByUserMultiplyWeightBy = $ifNotPreviouslyPurchasedByUserMultiplyWeightBy;
        return $result;
    }
    public static function hydrate(array $arr) : ProductRecentlyPurchasedByUserRelevanceModifier
    {
        $result = RelevanceModifier::hydrateBase(new ProductRecentlyPurchasedByUserRelevanceModifier(), $arr);
        if (array_key_exists("sinceUtc", $arr))
        {
            $result->sinceUtc = new DateTime($arr["sinceUtc"]);
        }
        if (array_key_exists("ifPreviouslyPurchasedByUserMultiplyWeightBy", $arr))
        {
            $result->ifPreviouslyPurchasedByUserMultiplyWeightBy = $arr["ifPreviouslyPurchasedByUserMultiplyWeightBy"];
        }
        if (array_key_exists("ifNotPreviouslyPurchasedByUserMultiplyWeightBy", $arr))
        {
            $result->ifNotPreviouslyPurchasedByUserMultiplyWeightBy = $arr["ifNotPreviouslyPurchasedByUserMultiplyWeightBy"];
        }
        return $result;
    }
    function setSinceUtc(DateTime $sinceUtc)
    {
        $this->sinceUtc = $sinceUtc;
        return $this;
    }
    function setIfPreviouslyPurchasedByUserMultiplyWeightBy(float $ifPreviouslyPurchasedByUserMultiplyWeightBy)
    {
        $this->ifPreviouslyPurchasedByUserMultiplyWeightBy = $ifPreviouslyPurchasedByUserMultiplyWeightBy;
        return $this;
    }
    function setIfNotPreviouslyPurchasedByUserMultiplyWeightBy(float $ifNotPreviouslyPurchasedByUserMultiplyWeightBy)
    {
        $this->ifNotPreviouslyPurchasedByUserMultiplyWeightBy = $ifNotPreviouslyPurchasedByUserMultiplyWeightBy;
        return $this;
    }
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
}
