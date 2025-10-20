<?php declare(strict_types=1);

namespace Relewise\Models;

/** Engagement payload describing the sentiment/favorite signals towards the content. */
class ContentEngagementData
{
    public ?ContentEngagementDataSentimentKind $sentiment;
    public ?bool $isFavorite;
    
    public static function create(?ContentEngagementDataSentimentKind $sentiment = Null, ?bool $isFavorite = Null) : ContentEngagementData
    {
        $result = new ContentEngagementData();
        $result->sentiment = $sentiment;
        $result->isFavorite = $isFavorite;
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentEngagementData
    {
        $result = new ContentEngagementData();
        if (array_key_exists("sentiment", $arr))
        {
            $result->sentiment = ContentEngagementDataSentimentKind::from($arr["sentiment"]);
        }
        if (array_key_exists("isFavorite", $arr))
        {
            $result->isFavorite = $arr["isFavorite"];
        }
        return $result;
    }
    
    function setSentiment(?ContentEngagementDataSentimentKind $sentiment)
    {
        $this->sentiment = $sentiment;
        return $this;
    }
    
    function setIsFavorite(?bool $isFavorite)
    {
        $this->isFavorite = $isFavorite;
        return $this;
    }
}
