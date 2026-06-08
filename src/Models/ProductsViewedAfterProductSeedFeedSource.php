<?php declare(strict_types=1);

namespace Relewise\Models;

/** Produces products that are commonly viewed after the products configured by ProductAndVariantIds. */
class ProductsViewedAfterProductSeedFeedSource extends EntityBySeedFeedSource
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Feed.Sources.ProductsViewedAfterProductSeedFeedSource, Relewise.Client";
    public static function create(FeedSourceSelectionPolicy $selectionPolicy, int $maxSeedItems, int $randomizationWindow) : ProductsViewedAfterProductSeedFeedSource
    {
        $result = new ProductsViewedAfterProductSeedFeedSource();
        $result->selectionPolicy = $selectionPolicy;
        $result->maxSeedItems = $maxSeedItems;
        $result->randomizationWindow = $randomizationWindow;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductsViewedAfterProductSeedFeedSource
    {
        $result = EntityBySeedFeedSource::hydrateBase(new ProductsViewedAfterProductSeedFeedSource(), $arr);
        return $result;
    }
    
    function setMaxSeedItems(int $maxSeedItems)
    {
        $this->maxSeedItems = $maxSeedItems;
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
