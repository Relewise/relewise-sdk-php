<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

/** a RelevanceModifier that can change the relevance of a Product depending on whether they have bought this product within some timespan. */
class ProductRecentlyPurchasedByUserRelevanceModifier extends RelevanceModifier implements JsonSerializable
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.ProductRecentlyPurchasedByUserRelevanceModifier, Relewise.Client";
    /** The start of the time period in which a product will be considered relevant to the user if bought previously by them. */
    public ?DateTime $sinceUtc;
    /** The weight that the Product will be multiplied with if it has been bought in the past by the user (since SinceUtc). */
    public float $ifPreviouslyPurchasedByUserMultiplyWeightBy;
    /** The weight that the Product will be multiplied with if it has not been bought in the past by the user (since SinceUtc). */
    public float $ifNotPreviouslyPurchasedByUserMultiplyWeightBy;
    /** The minutes since in which a product will be considered relevant to the user if bought previously by them. */
    public ?int $sinceMinutesAgo;
    /**
     * Creates a RelevanceModifier that can change the relevance of a Product depending on whether they have bought this product within some timespan.
     * @param DateTime $sinceUtc The start of the time period in which a product will be considered relevant to the user if bought previously by them.
     * @param float $ifPreviouslyPurchasedByUserMultiplyWeightBy The weight that the Product will be multiplied with if it has been bought in the past by the user (since SinceUtc).
     * @param float $ifNotPreviouslyPurchasedByUserMultiplyWeightBy The weight that the Product will be multiplied with if it has not been bought in the past by the user (since SinceUtc).
     */
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
        if (array_key_exists("sinceMinutesAgo", $arr))
        {
            $result->sinceMinutesAgo = $arr["sinceMinutesAgo"];
        }
        return $result;
    }
    
    /** The start of the time period in which a product will be considered relevant to the user if bought previously by them. */
    function setSinceUtc(?DateTime $sinceUtc)
    {
        $this->sinceUtc = $sinceUtc;
        return $this;
    }
    
    /** The weight that the Product will be multiplied with if it has been bought in the past by the user (since SinceUtc). */
    function setIfPreviouslyPurchasedByUserMultiplyWeightBy(float $ifPreviouslyPurchasedByUserMultiplyWeightBy)
    {
        $this->ifPreviouslyPurchasedByUserMultiplyWeightBy = $ifPreviouslyPurchasedByUserMultiplyWeightBy;
        return $this;
    }
    
    /** The weight that the Product will be multiplied with if it has not been bought in the past by the user (since SinceUtc). */
    function setIfNotPreviouslyPurchasedByUserMultiplyWeightBy(float $ifNotPreviouslyPurchasedByUserMultiplyWeightBy)
    {
        $this->ifNotPreviouslyPurchasedByUserMultiplyWeightBy = $ifNotPreviouslyPurchasedByUserMultiplyWeightBy;
        return $this;
    }
    
    /** The minutes since in which a product will be considered relevant to the user if bought previously by them. */
    function setSinceMinutesAgo(?int $sinceMinutesAgo)
    {
        $this->sinceMinutesAgo = $sinceMinutesAgo;
        return $this;
    }
    
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    public function jsonSerialize(): mixed
    {
        $result = array();
        $result["typeDefinition"] = $this->typeDefinition;
        if (isset($this->sinceUtc))
        {
            $result["sinceUtc"] = $this->sinceUtc->format(DATE_ATOM);
        }
        if (isset($this->ifPreviouslyPurchasedByUserMultiplyWeightBy))
        {
            $result["ifPreviouslyPurchasedByUserMultiplyWeightBy"] = $this->ifPreviouslyPurchasedByUserMultiplyWeightBy;
        }
        if (isset($this->ifNotPreviouslyPurchasedByUserMultiplyWeightBy))
        {
            $result["ifNotPreviouslyPurchasedByUserMultiplyWeightBy"] = $this->ifNotPreviouslyPurchasedByUserMultiplyWeightBy;
        }
        if (isset($this->sinceMinutesAgo))
        {
            $result["sinceMinutesAgo"] = $this->sinceMinutesAgo;
        }
        if (isset($this->filters))
        {
            $result["filters"] = $this->filters;
        }
        return $result;
    }
}
