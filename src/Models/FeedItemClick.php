<?php declare(strict_types=1);

namespace Relewise\Models;

/** Represents a user clicking interaction with a specific feed item. Typically used to track when navigating to the details page of the item from the feed. */
class FeedItemClick extends Trackable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Feed.FeedItemClick, Relewise.Client";
    /** The user who clicked the feed item. */
    public ?User $user;
    /** The unique identifier of the feed where the click occurred. This corresponds to the InitializedFeedId from a feed recommendation response. */
    public string $feedId;
    /** The specific feed item that was clicked. Can represent either a product (with optional variant) or content. */
    public FeedItem $item;
    
    /**
     * Initializes a new instance of the FeedItemClick class.
     * @param User $user The user who clicked the feed item.
     * @param string $feedId The unique identifier of the feed where the click occurred.
     * @param FeedItem $item The specific feed item that was clicked.
     */
    public static function create(User $user, string $feedId, FeedItem $item) : FeedItemClick
    {
        $result = new FeedItemClick();
        $result->user = $user;
        $result->feedId = $feedId;
        $result->item = $item;
        return $result;
    }
    
    public static function hydrate(array $arr) : FeedItemClick
    {
        $result = Trackable::hydrateBase(new FeedItemClick(), $arr);
        if (array_key_exists("user", $arr))
        {
            $result->user = User::hydrate($arr["user"]);
        }
        if (array_key_exists("feedId", $arr))
        {
            $result->feedId = $arr["feedId"];
        }
        if (array_key_exists("item", $arr))
        {
            $result->item = FeedItem::hydrate($arr["item"]);
        }
        return $result;
    }
    
    /** The user who clicked the feed item. */
    function setUser(?User $user)
    {
        $this->user = $user;
        return $this;
    }
    
    /** The unique identifier of the feed where the click occurred. This corresponds to the InitializedFeedId from a feed recommendation response. */
    function setFeedId(string $feedId)
    {
        $this->feedId = $feedId;
        return $this;
    }
    
    /** The specific feed item that was clicked. Can represent either a product (with optional variant) or content. */
    function setItem(FeedItem $item)
    {
        $this->item = $item;
        return $this;
    }
}
