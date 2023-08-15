<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** a RelevanceModifier that can change the relevance of a Product depending on whether they have bought this product within some timespan. */
class ProductRecentlyPurchasedByUserRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.ProductRecentlyPurchasedByUserRelevanceModifier, Relewise.Client";
    /** The start of the time period in which a product will be considered relevant to the user if bought previously by them. */
    public DateTime $sinceUtc;
    /** The weight that the Product will be multiplied with if it has been bought in the past by the user (since SinceUtc). */
    public float $ifPreviouslyPurchasedByUserMultiplyWeightBy;
    /** The weight that the Product will be multiplied with if it has not been bought in the past by the user (since SinceUtc). */
    public float $ifNotPreviouslyPurchasedByUserMultiplyWeightBy;
    /** Creates <inheritdoc cref="T:Relewise.Client.Requests.RelevanceModifiers.ProductRecentlyPurchasedByUserRelevanceModifier">            </inheritdoc> */
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
     * Sets ifPreviouslyPurchasedByUserMultiplyWeightBy to a new value.
     * @param float $ifPreviouslyPurchasedByUserMultiplyWeightBy new value.
     */
    function setIfPreviouslyPurchasedByUserMultiplyWeightBy(float $ifPreviouslyPurchasedByUserMultiplyWeightBy)
    {
        $this->ifPreviouslyPurchasedByUserMultiplyWeightBy = $ifPreviouslyPurchasedByUserMultiplyWeightBy;
        return $this;
    }
    /**
     * Sets ifNotPreviouslyPurchasedByUserMultiplyWeightBy to a new value.
     * @param float $ifNotPreviouslyPurchasedByUserMultiplyWeightBy new value.
     */
    function setIfNotPreviouslyPurchasedByUserMultiplyWeightBy(float $ifNotPreviouslyPurchasedByUserMultiplyWeightBy)
    {
        $this->ifNotPreviouslyPurchasedByUserMultiplyWeightBy = $ifNotPreviouslyPurchasedByUserMultiplyWeightBy;
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
