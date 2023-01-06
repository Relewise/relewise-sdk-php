<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

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
            $result->sinceUtc = $arr["sinceUtc"];
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
    function withSinceUtc(DateTime $sinceUtc)
    {
        $this->sinceUtc = $sinceUtc;
        return $this;
    }
    function withIfPreviouslyViewedByUserMultiplyWeightBy(float $ifPreviouslyViewedByUserMultiplyWeightBy)
    {
        $this->ifPreviouslyViewedByUserMultiplyWeightBy = $ifPreviouslyViewedByUserMultiplyWeightBy;
        return $this;
    }
    function withIfNotPreviouslyViewedByUserMultiplyWeightBy(float $ifNotPreviouslyViewedByUserMultiplyWeightBy)
    {
        $this->ifNotPreviouslyViewedByUserMultiplyWeightBy = $ifNotPreviouslyViewedByUserMultiplyWeightBy;
        return $this;
    }
    function withFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    function withCustom(string $key, string $value)
    {
        if (!isset($this->custom))
        {
            $this->custom = array();
        }
        $this->custom[$key] = $value;
        return $this;
    }
}
