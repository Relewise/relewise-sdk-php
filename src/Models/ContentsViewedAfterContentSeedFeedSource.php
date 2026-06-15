<?php declare(strict_types=1);

namespace Relewise\Models;

/** Produces content that is commonly viewed after the content configured by ContentIds.  Use this feed source to show related content items in feeds on content pages. */
class ContentsViewedAfterContentSeedFeedSource extends EntityBySeedFeedSource implements IContentFeedSource
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Feed.Sources.ContentsViewedAfterContentSeedFeedSource, Relewise.Client";
    public static function create(FeedSourceSelectionPolicy $selectionPolicy, int $maxSeedItems, int $randomizationWindow) : ContentsViewedAfterContentSeedFeedSource
    {
        $result = new ContentsViewedAfterContentSeedFeedSource();
        $result->selectionPolicy = $selectionPolicy;
        $result->maxSeedItems = $maxSeedItems;
        $result->randomizationWindow = $randomizationWindow;
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentsViewedAfterContentSeedFeedSource
    {
        $result = EntityBySeedFeedSource::hydrateBase(new ContentsViewedAfterContentSeedFeedSource(), $arr);
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
