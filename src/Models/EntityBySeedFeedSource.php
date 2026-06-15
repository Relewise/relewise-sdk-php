<?php declare(strict_types=1);

namespace Relewise\Models;

/** Base class for feed sources that use input from Seed. */
abstract class EntityBySeedFeedSource extends FeedSource
{
    public string $typeDefinition = "";
    /** Limits how many seed items are considered when building the result queue. */
    public int $maxSeedItems;
    /** Controls how much local randomization is applied to the result queue. */
    public int $randomizationWindow;
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ContentByOverlappingDataValuesWithContentSeedFeedSource, Relewise.Client")
        {
            return ContentByOverlappingDataValuesWithContentSeedFeedSource::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ContentsViewedAfterContentSeedFeedSource, Relewise.Client")
        {
            return ContentsViewedAfterContentSeedFeedSource::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ContentsViewedAfterProductSeedFeedSource, Relewise.Client")
        {
            return ContentsViewedAfterProductSeedFeedSource::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ProductsPurchasedWithProductSeedFeedSource, Relewise.Client")
        {
            return ProductsPurchasedWithProductSeedFeedSource::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ProductsViewedAfterContentSeedFeedSource, Relewise.Client")
        {
            return ProductsViewedAfterContentSeedFeedSource::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ProductsViewedAfterProductSeedFeedSource, Relewise.Client")
        {
            return ProductsViewedAfterProductSeedFeedSource::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = FeedSource::hydrateBase($result, $arr);
        if (array_key_exists("maxSeedItems", $arr))
        {
            $result->maxSeedItems = $arr["maxSeedItems"];
        }
        if (array_key_exists("randomizationWindow", $arr))
        {
            $result->randomizationWindow = $arr["randomizationWindow"];
        }
        return $result;
    }
    
    /** Limits how many seed items are considered when building the result queue. */
    function setMaxSeedItems(int $maxSeedItems)
    {
        $this->maxSeedItems = $maxSeedItems;
        return $this;
    }
    
    /** Controls how much local randomization is applied to the result queue. */
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
