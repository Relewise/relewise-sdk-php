<?php declare(strict_types=1);

namespace Relewise\Models;

/** Produces most popular content for the configured time window. */
class ContentByPopularityFeedSource extends FeedSource implements IContentFeedSource
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Feed.Sources.ContentByPopularityFeedSource, Relewise.Client";
    /** The time window in minutes used when reading the popularity source. */
    public int $popularityWindowMinutes;
    /** Controls how much local randomization is applied after ranking by popularity.  Randomization makes every impression of the feed unique by slightly changing the order of items which rank close to each other. */
    public int $randomizationWindow;
    
    public static function create(FeedSourceSelectionPolicy $selectionPolicy, int $popularityWindowMinutes, int $randomizationWindow) : ContentByPopularityFeedSource
    {
        $result = new ContentByPopularityFeedSource();
        $result->selectionPolicy = $selectionPolicy;
        $result->popularityWindowMinutes = $popularityWindowMinutes;
        $result->randomizationWindow = $randomizationWindow;
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentByPopularityFeedSource
    {
        $result = FeedSource::hydrateBase(new ContentByPopularityFeedSource(), $arr);
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
    
    /** The time window in minutes used when reading the popularity source. */
    function setPopularityWindowMinutes(int $popularityWindowMinutes)
    {
        $this->popularityWindowMinutes = $popularityWindowMinutes;
        return $this;
    }
    
    /** Controls how much local randomization is applied after ranking by popularity.  Randomization makes every impression of the feed unique by slightly changing the order of items which rank close to each other. */
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
