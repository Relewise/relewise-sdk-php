<?php declare(strict_types=1);

namespace Relewise\Models;

/** Represents engagement signals (sentiment / favorite) for a Product. At least one of Sentiment or IsFavorite must be provided. */
class ProductEngagementData
{
    /** Gets or sets the sentiment expressed towards the product. Null when no explicit sentiment was recorded. */
    public ?ProductEngagementDataSentimentKind $sentiment;
    /** Gets or sets whether the product is marked as a favorite by the user. Null when unknown or not recorded. */
    public ?bool $isFavorite;
    
    public static function create(?ProductEngagementDataSentimentKind $sentiment = Null, ?bool $isFavorite = Null) : ProductEngagementData
    {
        $result = new ProductEngagementData();
        $result->sentiment = $sentiment;
        $result->isFavorite = $isFavorite;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductEngagementData
    {
        $result = new ProductEngagementData();
        if (array_key_exists("sentiment", $arr))
        {
            $result->sentiment = ProductEngagementDataSentimentKind::from($arr["sentiment"]);
        }
        if (array_key_exists("isFavorite", $arr))
        {
            $result->isFavorite = $arr["isFavorite"];
        }
        return $result;
    }
    
    /** Gets or sets the sentiment expressed towards the product. Null when no explicit sentiment was recorded. */
    function setSentiment(?ProductEngagementDataSentimentKind $sentiment)
    {
        $this->sentiment = $sentiment;
        return $this;
    }
    
    /** Gets or sets whether the product is marked as a favorite by the user. Null when unknown or not recorded. */
    function setIsFavorite(?bool $isFavorite)
    {
        $this->isFavorite = $isFavorite;
        return $this;
    }
}
