<?php declare(strict_types=1);

namespace Relewise\Models;

/** Produces content by scoring overlap between seeded content data values and candidate content data values.  Use this feed source to show content with similar attributes, such as color or tags, as the seed, for example, on a content page. */
class ContentByOverlappingDataValuesWithContentSeedFeedSource extends EntityBySeedFeedSource implements IContentFeedSource
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Feed.Sources.ContentByOverlappingDataValuesWithContentSeedFeedSource, Relewise.Client";
    /** The content data keys whose values should be compared between the feed seed and each candidate. */
    public array $contentDataKeys;
    /** Limits how deep into the popularity-ordered content collection the producer scans before building its queue. */
    public int $contentPopularityThreshold;
    
    public static function create(FeedSourceSelectionPolicy $selectionPolicy, int $maxSeedItems, array $contentDataKeys, int $contentPopularityThreshold, int $randomizationWindow) : ContentByOverlappingDataValuesWithContentSeedFeedSource
    {
        $result = new ContentByOverlappingDataValuesWithContentSeedFeedSource();
        $result->selectionPolicy = $selectionPolicy;
        $result->maxSeedItems = $maxSeedItems;
        $result->contentDataKeys = $contentDataKeys;
        $result->contentPopularityThreshold = $contentPopularityThreshold;
        $result->randomizationWindow = $randomizationWindow;
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentByOverlappingDataValuesWithContentSeedFeedSource
    {
        $result = EntityBySeedFeedSource::hydrateBase(new ContentByOverlappingDataValuesWithContentSeedFeedSource(), $arr);
        if (array_key_exists("contentDataKeys", $arr))
        {
            $result->contentDataKeys = array();
            foreach($arr["contentDataKeys"] as &$value)
            {
                array_push($result->contentDataKeys, FeedEntityDataKey::hydrate($value));
            }
        }
        if (array_key_exists("contentPopularityThreshold", $arr))
        {
            $result->contentPopularityThreshold = $arr["contentPopularityThreshold"];
        }
        return $result;
    }
    
    /** The content data keys whose values should be compared between the feed seed and each candidate. */
    function setContentDataKeys(FeedEntityDataKey ... $contentDataKeys)
    {
        $this->contentDataKeys = $contentDataKeys;
        return $this;
    }
    
    /**
     * The content data keys whose values should be compared between the feed seed and each candidate.
     * @param FeedEntityDataKey[] $contentDataKeys new value.
     */
    function setContentDataKeysFromArray(array $contentDataKeys)
    {
        $this->contentDataKeys = $contentDataKeys;
        return $this;
    }
    
    /** The content data keys whose values should be compared between the feed seed and each candidate. */
    function addToContentDataKeys(FeedEntityDataKey $contentDataKeys)
    {
        if (!isset($this->contentDataKeys))
        {
            $this->contentDataKeys = array();
        }
        array_push($this->contentDataKeys, $contentDataKeys);
        return $this;
    }
    
    /** Limits how deep into the popularity-ordered content collection the producer scans before building its queue. */
    function setContentPopularityThreshold(int $contentPopularityThreshold)
    {
        $this->contentPopularityThreshold = $contentPopularityThreshold;
        return $this;
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
