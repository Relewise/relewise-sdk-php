<?php declare(strict_types=1);

namespace Relewise\Models;

/** Produces a feed of most viewed products for the configured time window. */
class ProductByViewPopularityFeedSource extends ProductByPopularityFeedSource
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Feed.Sources.ProductByViewPopularityFeedSource, Relewise.Client";
    public static function create(FeedSourceSelectionPolicy $selectionPolicy, int $popularityWindowMinutes, int $randomizationWindow) : ProductByViewPopularityFeedSource
    {
        $result = new ProductByViewPopularityFeedSource();
        $result->selectionPolicy = $selectionPolicy;
        $result->popularityWindowMinutes = $popularityWindowMinutes;
        $result->randomizationWindow = $randomizationWindow;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductByViewPopularityFeedSource
    {
        $result = ProductByPopularityFeedSource::hydrateBase(new ProductByViewPopularityFeedSource(), $arr);
        return $result;
    }
    
    function setPopularityWindowMinutes(int $popularityWindowMinutes)
    {
        $this->popularityWindowMinutes = $popularityWindowMinutes;
        return $this;
    }
    
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
