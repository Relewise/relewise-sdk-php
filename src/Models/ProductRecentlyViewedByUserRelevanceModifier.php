<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** a RelevanceModifier that can change the relevance of a Product depending on whether they have viewed this product within some timespan. */
class ProductRecentlyViewedByUserRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.ProductRecentlyViewedByUserRelevanceModifier, Relewise.Client";
    /** The start of the time period in which a product will be considered relevant to the user if viewed previously by them. */
    public DateTime $sinceUtc;
    /** The weight that the Product will be multiplied with if it has been viewed in the past by the user (since SinceUtc). */
    public float $ifPreviouslyViewedByUserMultiplyWeightBy;
    /** The weight that the Product will be multiplied with if it has not been viewed in the past by the user (since SinceUtc). */
    public float $ifNotPreviouslyViewedByUserMultiplyWeightBy;
    /** Creates <inheritdoc cref="T:Relewise.Client.Requests.RelevanceModifiers.ProductRecentlyViewedByUserRelevanceModifier">            </inheritdoc> */
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
    /**
     * Sets sinceUtc to a new value.
     * @param DateTime $sinceUtc new value.
     */
    function setSinceUtc(DateTime $sinceUtc)
    {
        $this->sinceUtc = $sinceUtc;
        return $this;
    }
    /**
     * Sets ifPreviouslyViewedByUserMultiplyWeightBy to a new value.
     * @param float $ifPreviouslyViewedByUserMultiplyWeightBy new value.
     */
    function setIfPreviouslyViewedByUserMultiplyWeightBy(float $ifPreviouslyViewedByUserMultiplyWeightBy)
    {
        $this->ifPreviouslyViewedByUserMultiplyWeightBy = $ifPreviouslyViewedByUserMultiplyWeightBy;
        return $this;
    }
    /**
     * Sets ifNotPreviouslyViewedByUserMultiplyWeightBy to a new value.
     * @param float $ifNotPreviouslyViewedByUserMultiplyWeightBy new value.
     */
    function setIfNotPreviouslyViewedByUserMultiplyWeightBy(float $ifNotPreviouslyViewedByUserMultiplyWeightBy)
    {
        $this->ifNotPreviouslyViewedByUserMultiplyWeightBy = $ifNotPreviouslyViewedByUserMultiplyWeightBy;
        return $this;
    }
    /**
     * Sets filters to a new value.
     * @param FilterCollection $filters new value.
     */
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
}
