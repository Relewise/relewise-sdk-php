<?php declare(strict_types=1);

namespace Relewise\Models;

/** Base settings for product popularity feed sources. */
abstract class ProductByPopularityFeedSource extends FeedSource
{
    public string $typeDefinition = "";
    /** The time window in minutes used to calculate the popularity score. */
    public int $popularityWindowMinutes;
    /** Controls how much local randomization is applied after ranking by popularity. */
    public int $randomizationWindow;
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ProductByPurchasePopularityFeedSource, Relewise.Client")
        {
            return ProductByPurchasePopularityFeedSource::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ProductByViewPopularityFeedSource, Relewise.Client")
        {
            return ProductByViewPopularityFeedSource::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = FeedSource::hydrateBase($result, $arr);
        if (array_key_exists("popularityWindowMinutes", $arr))
        {
            $result->popularityWindowMinutes = $arr["popularityWindowMinutes"];
        }
        if (array_key_exists("randomizationWindow", $arr))
        {
            $result->randomizationWindow = $arr["randomizationWindow"];
        }
        return $result;
    }
    
    /** The time window in minutes used to calculate the popularity score. */
    function setPopularityWindowMinutes(int $popularityWindowMinutes)
    {
        $this->popularityWindowMinutes = $popularityWindowMinutes;
        return $this;
    }
    
    /** Controls how much local randomization is applied after ranking by popularity. */
    function setRandomizationWindow(int $randomizationWindow)
    {
        $this->randomizationWindow = $randomizationWindow;
        return $this;
    }
    
    function setEnabled(bool $enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }
    
    function setSelectionPolicy(FeedSourceSelectionPolicy $selectionPolicy)
    {
        $this->selectionPolicy = $selectionPolicy;
        return $this;
    }
    
    function setMaxResults(?int $maxResults)
    {
        $this->maxResults = $maxResults;
        return $this;
    }
    
    function setMaxResultsPerChanceGiven(?int $maxResultsPerChanceGiven)
    {
        $this->maxResultsPerChanceGiven = $maxResultsPerChanceGiven;
        return $this;
    }
}
