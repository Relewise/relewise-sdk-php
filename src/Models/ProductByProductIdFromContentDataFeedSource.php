<?php declare(strict_types=1);

namespace Relewise\Models;

/** Shows products referenced by content items that were recently shown in the feed, when combined with a feed source that shows content.  Use this feed source to inject related products into a feed of content items such as short promotional videos. */
class ProductByProductIdFromContentDataFeedSource extends FeedSource
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Feed.Sources.ProductByProductIdFromContentDataFeedSource, Relewise.Client";
    /** The content data key that contains product ids. */
    public string $contentDataKey;
    /** Defines proximity between a previously shown content and a newly produced product items in the feed.  Lower value will place product items in closer proximity to the content items that reference them. */
    public int $maxLookBehindDistance;
    /** Defines how many content items to consider and produce product items from, before moving to the next feed source.  Lower value focuses on fewer and more recent content items to retrieve products from. See also MaxResultsPerChanceGiven as a way to define how many products to show each time. */
    public int $maxLookBehindCount;
    /** Controls how much randomization is applied to the output. */
    public int $randomizationWindow;
    
    public static function create(FeedSourceSelectionPolicy $selectionPolicy, string $contentDataKey, int $maxLookBehindDistance, int $maxLookBehindCount, int $randomizationWindow) : ProductByProductIdFromContentDataFeedSource
    {
        $result = new ProductByProductIdFromContentDataFeedSource();
        $result->selectionPolicy = $selectionPolicy;
        $result->contentDataKey = $contentDataKey;
        $result->maxLookBehindDistance = $maxLookBehindDistance;
        $result->maxLookBehindCount = $maxLookBehindCount;
        $result->randomizationWindow = $randomizationWindow;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductByProductIdFromContentDataFeedSource
    {
        $result = FeedSource::hydrateBase(new ProductByProductIdFromContentDataFeedSource(), $arr);
        if (array_key_exists("contentDataKey", $arr))
        {
            $result->contentDataKey = $arr["contentDataKey"];
        }
        if (array_key_exists("maxLookBehindDistance", $arr))
        {
            $result->maxLookBehindDistance = $arr["maxLookBehindDistance"];
        }
        if (array_key_exists("maxLookBehindCount", $arr))
        {
            $result->maxLookBehindCount = $arr["maxLookBehindCount"];
        }
        if (array_key_exists("randomizationWindow", $arr))
        {
            $result->randomizationWindow = $arr["randomizationWindow"];
        }
        return $result;
    }
    
    /** The content data key that contains product ids. */
    function setContentDataKey(string $contentDataKey)
    {
        $this->contentDataKey = $contentDataKey;
        return $this;
    }
    
    /** Defines proximity between a previously shown content and a newly produced product items in the feed.  Lower value will place product items in closer proximity to the content items that reference them. */
    function setMaxLookBehindDistance(int $maxLookBehindDistance)
    {
        $this->maxLookBehindDistance = $maxLookBehindDistance;
        return $this;
    }
    
    /** Defines how many content items to consider and produce product items from, before moving to the next feed source.  Lower value focuses on fewer and more recent content items to retrieve products from. See also MaxResultsPerChanceGiven as a way to define how many products to show each time. */
    function setMaxLookBehindCount(int $maxLookBehindCount)
    {
        $this->maxLookBehindCount = $maxLookBehindCount;
        return $this;
    }
    
    /** Controls how much randomization is applied to the output. */
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
