<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductRecentlyViewedByUserRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.ProductRecentlyViewedByUserRelevanceModifier, Relewise.Client";
    public DateTime $sinceUtc;
    public float $ifPreviouslyViewedByUserMultiplyWeightBy;
    public float $ifNotPreviouslyViewedByUserMultiplyWeightBy;
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
        $result = RelevanceModifier::hydrateBase(new ProductRecentlyViewedByUserRelevanceModifier(), $arr);
        if (array_key_exists("sinceUtc", $arr))
        {
            $result->sinceUtc = new DateTime($arr["sinceUtc"]);
        }
        if (array_key_exists("ifPreviouslyViewedByUserMultiplyWeightBy", $arr))
        {
            $result->ifPreviouslyViewedByUserMultiplyWeightBy = $arr["ifPreviouslyViewedByUserMultiplyWeightBy"];
        }
        if (array_key_exists("ifNotPreviouslyViewedByUserMultiplyWeightBy", $arr))
        {
            $result->ifNotPreviouslyViewedByUserMultiplyWeightBy = $arr["ifNotPreviouslyViewedByUserMultiplyWeightBy"];
        }
        return $result;
    }
    function setSinceUtc(DateTime $sinceUtc)
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
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
}
