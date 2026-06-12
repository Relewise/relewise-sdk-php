<?php declare(strict_types=1);

namespace Relewise\Models;

/** Produces a feed of most purchased products for the configured time window. */
class ProductByPurchasePopularityFeedSource extends ProductByPopularityFeedSource implements IProductFeedSource
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Feed.Sources.ProductByPurchasePopularityFeedSource, Relewise.Client";
    public static function create(FeedSourceSelectionPolicy $selectionPolicy, int $popularityWindowMinutes, int $randomizationWindow) : ProductByPurchasePopularityFeedSource
    {
        $result = new ProductByPurchasePopularityFeedSource();
        $result->selectionPolicy = $selectionPolicy;
        $result->popularityWindowMinutes = $popularityWindowMinutes;
        $result->randomizationWindow = $randomizationWindow;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductByPurchasePopularityFeedSource
    {
        $result = ProductByPopularityFeedSource::hydrateBase(new ProductByPurchasePopularityFeedSource(), $arr);
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
