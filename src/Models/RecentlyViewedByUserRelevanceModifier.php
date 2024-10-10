<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

abstract class RecentlyViewedByUserRelevanceModifier extends RelevanceModifier implements JsonSerializable
{
    public string $typeDefinition = "";
    
    /** The start of the time period in which an entity will be considered relevant to the user if viewed previously by them. */
    public ?DateTime $sinceUtc;
    /** The weight that the entity will be multiplied with if it has been viewed in the past by the user (since SinceUtc). */
    public float $ifPreviouslyViewedByUserMultiplyWeightBy;
    /** The weight that the entity will be multiplied with if it has not been viewed in the past by the user (since SinceUtc). */
    public float $ifNotPreviouslyViewedByUserMultiplyWeightBy;
    /** The minutes since in which an entity will be considered relevant to the user if viewed previously by them. */
    public ?int $sinceMinutesAgo;
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.RelevanceModifiers.ContentCategoryRecentlyViewedByUserRelevanceModifier, Relewise.Client")
        {
            return ContentCategoryRecentlyViewedByUserRelevanceModifier::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.RelevanceModifiers.ContentRecentlyViewedByUserRelevanceModifier, Relewise.Client")
        {
            return ContentRecentlyViewedByUserRelevanceModifier::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.RelevanceModifiers.ProductCategoryRecentlyViewedByUserRelevanceModifier, Relewise.Client")
        {
            return ProductCategoryRecentlyViewedByUserRelevanceModifier::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.RelevanceModifiers.ProductRecentlyViewedByUserRelevanceModifier, Relewise.Client")
        {
            return ProductRecentlyViewedByUserRelevanceModifier::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = RelevanceModifier::hydrateBase($result, $arr);
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
        if (array_key_exists("sinceMinutesAgo", $arr))
        {
            $result->sinceMinutesAgo = $arr["sinceMinutesAgo"];
        }
        return $result;
    }
    
    /** The start of the time period in which an entity will be considered relevant to the user if viewed previously by them. */
    function setSinceUtc(?DateTime $sinceUtc)
    {
        $this->sinceUtc = $sinceUtc;
        return $this;
    }
    
    /** The weight that the entity will be multiplied with if it has been viewed in the past by the user (since SinceUtc). */
    function setIfPreviouslyViewedByUserMultiplyWeightBy(float $ifPreviouslyViewedByUserMultiplyWeightBy)
    {
        $this->ifPreviouslyViewedByUserMultiplyWeightBy = $ifPreviouslyViewedByUserMultiplyWeightBy;
        return $this;
    }
    
    /** The weight that the entity will be multiplied with if it has not been viewed in the past by the user (since SinceUtc). */
    function setIfNotPreviouslyViewedByUserMultiplyWeightBy(float $ifNotPreviouslyViewedByUserMultiplyWeightBy)
    {
        $this->ifNotPreviouslyViewedByUserMultiplyWeightBy = $ifNotPreviouslyViewedByUserMultiplyWeightBy;
        return $this;
    }
    
    /** The minutes since in which an entity will be considered relevant to the user if viewed previously by them. */
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
        if (isset($this->sinceUtc))
        {
            $result["sinceUtc"] = $this->sinceUtc->format(DATE_ATOM);
        }
        if (isset($this->ifPreviouslyViewedByUserMultiplyWeightBy))
        {
            $result["ifPreviouslyViewedByUserMultiplyWeightBy"] = $this->ifPreviouslyViewedByUserMultiplyWeightBy;
        }
        if (isset($this->ifNotPreviouslyViewedByUserMultiplyWeightBy))
        {
            $result["ifNotPreviouslyViewedByUserMultiplyWeightBy"] = $this->ifNotPreviouslyViewedByUserMultiplyWeightBy;
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
