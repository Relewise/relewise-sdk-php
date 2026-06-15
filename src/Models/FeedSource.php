<?php declare(strict_types=1);

namespace Relewise\Models;

/** Base settings for a feed source, including enablement, selection policy, and per-source result limits. */
abstract class FeedSource
{
    public string $typeDefinition = "";
    /** Indicates whether this feed source is active. */
    public bool $enabled;
    /** Determines how this feed source is prioritized and how ties are broken. */
    public FeedSourceSelectionPolicy $selectionPolicy;
    /** Limits the total number of items this feed source may return. */
    public ?int $maxResults;
    /** Limits the number of items this feed source may return per chance given. */
    public ?int $maxResultsPerChanceGiven;
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ContentByOverlappingDataValuesWithContentSeedFeedSource, Relewise.Client")
        {
            return ContentByOverlappingDataValuesWithContentSeedFeedSource::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ContentByPopularityFeedSource, Relewise.Client")
        {
            return ContentByPopularityFeedSource::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ContentByProductPopularityOfProductIdFromContentDataFeedSource, Relewise.Client")
        {
            return ContentByProductPopularityOfProductIdFromContentDataFeedSource::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ContentsViewedAfterContentSeedFeedSource, Relewise.Client")
        {
            return ContentsViewedAfterContentSeedFeedSource::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ContentsViewedAfterProductSeedFeedSource, Relewise.Client")
        {
            return ContentsViewedAfterProductSeedFeedSource::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ProductByProductIdFromContentDataFeedSource, Relewise.Client")
        {
            return ProductByProductIdFromContentDataFeedSource::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ProductByPurchasePopularityFeedSource, Relewise.Client")
        {
            return ProductByPurchasePopularityFeedSource::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Feed.Sources.ProductByViewPopularityFeedSource, Relewise.Client")
        {
            return ProductByViewPopularityFeedSource::hydrate($arr);
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
        if (array_key_exists("enabled", $arr))
        {
            $result->enabled = $arr["enabled"];
        }
        if (array_key_exists("selectionPolicy", $arr))
        {
            $result->selectionPolicy = FeedSourceSelectionPolicy::hydrate($arr["selectionPolicy"]);
        }
        if (array_key_exists("maxResults", $arr))
        {
            $result->maxResults = $arr["maxResults"];
        }
        if (array_key_exists("maxResultsPerChanceGiven", $arr))
        {
            $result->maxResultsPerChanceGiven = $arr["maxResultsPerChanceGiven"];
        }
        return $result;
    }
    
    /** Indicates whether this feed source is active. */
    function setEnabled(bool $enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }
    
    /** Determines how this feed source is prioritized and how ties are broken. */
    function setSelectionPolicy(FeedSourceSelectionPolicy $selectionPolicy)
    {
        $this->selectionPolicy = $selectionPolicy;
        return $this;
    }
    
    /** Limits the total number of items this feed source may return. */
    function setMaxResults(?int $maxResults)
    {
        $this->maxResults = $maxResults;
        return $this;
    }
    
    /** Limits the number of items this feed source may return per chance given. */
    function setMaxResultsPerChanceGiven(?int $maxResultsPerChanceGiven)
    {
        $this->maxResultsPerChanceGiven = $maxResultsPerChanceGiven;
        return $this;
    }
}
