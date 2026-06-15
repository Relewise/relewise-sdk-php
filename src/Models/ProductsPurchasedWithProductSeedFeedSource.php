<?php declare(strict_types=1);

namespace Relewise\Models;

/** Produces products that are commonly purchased with the products configured by ProductAndVariantIds. */
class ProductsPurchasedWithProductSeedFeedSource extends EntityBySeedFeedSource implements IProductFeedSource
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Feed.Sources.ProductsPurchasedWithProductSeedFeedSource, Relewise.Client";
    public static function create(FeedSourceSelectionPolicy $selectionPolicy, int $maxSeedItems, int $randomizationWindow) : ProductsPurchasedWithProductSeedFeedSource
    {
        $result = new ProductsPurchasedWithProductSeedFeedSource();
        $result->selectionPolicy = $selectionPolicy;
        $result->maxSeedItems = $maxSeedItems;
        $result->randomizationWindow = $randomizationWindow;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductsPurchasedWithProductSeedFeedSource
    {
        $result = EntityBySeedFeedSource::hydrateBase(new ProductsPurchasedWithProductSeedFeedSource(), $arr);
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
