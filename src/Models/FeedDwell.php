<?php declare(strict_types=1);

namespace Relewise\Models;

/** Represents user dwell time tracking for feed items, capturing how long a user spent viewing specific items in a feed. Used to measure user engagement and improve future feed recommendations based on time spent consuming content. */
class FeedDwell extends Trackable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Feed.FeedDwell, Relewise.Client";
    /** The user who dwelled on the feed items. */
    public ?User $user;
    /** The unique identifier of the feed where the dwell occurred. This corresponds to the InitializedFeedId from a feed recommendation response. */
    public string $feedId;
    /** The total time in milliseconds that the user spent viewing the visible items. Must be at least 1. */
    public int $dwellTimeMilliseconds;
    /** The collection of feed items that were visible to the user during the dwell period. Must contain at least one item. */
    public array $visibleItems;
    
    /**
     * Initializes a new instance of the FeedDwell class.
     * @param User $user The user who was viewing the feed items.
     * @param string $feedId The unique identifier of the feed where the dwell occurred.
     * @param int $dwellTimeMilliseconds The total time in milliseconds that the user spent viewing the visible items.
     * @param FeedItem[] $visibleItems The collection of feed items that were visible to the user during the dwell period.
     */
    public static function create(User $user, string $feedId, int $dwellTimeMilliseconds, FeedItem ... $visibleItems) : FeedDwell
    {
        $result = new FeedDwell();
        $result->user = $user;
        $result->feedId = $feedId;
        $result->dwellTimeMilliseconds = $dwellTimeMilliseconds;
        $result->visibleItems = $visibleItems;
        return $result;
    }
    
    public static function hydrate(array $arr) : FeedDwell
    {
        $result = Trackable::hydrateBase(new FeedDwell(), $arr);
        if (array_key_exists("user", $arr))
        {
            $result->user = User::hydrate($arr["user"]);
        }
        if (array_key_exists("feedId", $arr))
        {
            $result->feedId = $arr["feedId"];
        }
        if (array_key_exists("dwellTimeMilliseconds", $arr))
        {
            $result->dwellTimeMilliseconds = $arr["dwellTimeMilliseconds"];
        }
        if (array_key_exists("visibleItems", $arr))
        {
            $result->visibleItems = array();
            foreach($arr["visibleItems"] as &$value)
            {
                array_push($result->visibleItems, FeedItem::hydrate($value));
            }
        }
        return $result;
    }
    
    /** The user who dwelled on the feed items. */
    function setUser(?User $user)
    {
        $this->user = $user;
        return $this;
    }
    
    /** The unique identifier of the feed where the dwell occurred. This corresponds to the InitializedFeedId from a feed recommendation response. */
    function setFeedId(string $feedId)
    {
        $this->feedId = $feedId;
        return $this;
    }
    
    /** The total time in milliseconds that the user spent viewing the visible items. Must be at least 1. */
    function setDwellTimeMilliseconds(int $dwellTimeMilliseconds)
    {
        $this->dwellTimeMilliseconds = $dwellTimeMilliseconds;
        return $this;
    }
    
    /** The collection of feed items that were visible to the user during the dwell period. Must contain at least one item. */
    function setVisibleItems(FeedItem ... $visibleItems)
    {
        $this->visibleItems = $visibleItems;
        return $this;
    }
    
    /**
     * The collection of feed items that were visible to the user during the dwell period. Must contain at least one item.
     * @param FeedItem[] $visibleItems new value.
     */
    function setVisibleItemsFromArray(array $visibleItems)
    {
        $this->visibleItems = $visibleItems;
        return $this;
    }
    
    /** The collection of feed items that were visible to the user during the dwell period. Must contain at least one item. */
    function addToVisibleItems(FeedItem $visibleItems)
    {
        if (!isset($this->visibleItems))
        {
            $this->visibleItems = array();
        }
        array_push($this->visibleItems, $visibleItems);
        return $this;
    }
}
