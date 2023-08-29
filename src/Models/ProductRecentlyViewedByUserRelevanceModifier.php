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
    /**
     * Creates             a RelevanceModifier that can change the relevance of a Product depending on whether they have viewed this product within some timespan.
     * @param DateTime $sinceUtc The start of the time period in which a product will be considered relevant to the user if viewed previously by them.
     * @param float $ifPreviouslyViewedByUserMultiplyWeightBy The weight that the Product will be multiplied with if it has been viewed in the past by the user (since ).
     * @param float $ifNotPreviouslyViewedByUserMultiplyWeightBy The weight that the Product will be multiplied with if it has not been viewed in the past by the user (since ).
     */
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
    /** The start of the time period in which a product will be considered relevant to the user if viewed previously by them. */
    function setSinceUtc(DateTime $sinceUtc)
    {
        $this->sinceUtc = $sinceUtc;
        return $this;
    }
    /** The weight that the Product will be multiplied with if it has been viewed in the past by the user (since SinceUtc). */
    function setIfPreviouslyViewedByUserMultiplyWeightBy(float $ifPreviouslyViewedByUserMultiplyWeightBy)
    {
        $this->ifPreviouslyViewedByUserMultiplyWeightBy = $ifPreviouslyViewedByUserMultiplyWeightBy;
        return $this;
    }
    /** The weight that the Product will be multiplied with if it has not been viewed in the past by the user (since SinceUtc). */
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
