<?php declare(strict_types=1);

namespace Relewise\Models;

/** Represents a user preview interaction with a specific feed item, typically when an item in the feed is opened in an overlay or zoomed to full viewport Used to track user engagement and interest in feed items to improve future recommendations and measure item visibility. */
class FeedItemPreview extends Trackable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Feed.FeedItemPreview, Relewise.Client";
    /** The user who previewed the feed item. */
    public ?User $user;
    /** The unique identifier of the feed where the preview occurred. This corresponds to the InitializedFeedId from a feed recommendation response. */
    public string $feedId;
    /** The specific feed item that was previewed. Can represent either a product (with optional variant) or content. */
    public FeedItem $item;
    
    /**
     * Initializes a new instance of the FeedItemPreview class.
     * @param User $user The user who previewed the feed item.
     * @param string $feedId The unique identifier of the feed where the preview occurred.
     * @param FeedItem $item The specific feed item that was previewed.
     */
    public static function create(User $user, string $feedId, FeedItem $item) : FeedItemPreview
    {
        $result = new FeedItemPreview();
        $result->user = $user;
        $result->feedId = $feedId;
        $result->item = $item;
        return $result;
    }
    
    public static function hydrate(array $arr) : FeedItemPreview
    {
        $result = Trackable::hydrateBase(new FeedItemPreview(), $arr);
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
    
    /** The user who previewed the feed item. */
    function setUser(?User $user)
    {
        $this->user = $user;
        return $this;
    }
    
    /** The unique identifier of the feed where the preview occurred. This corresponds to the InitializedFeedId from a feed recommendation response. */
    function setFeedId(string $feedId)
    {
        $this->feedId = $feedId;
        return $this;
    }
    
    /** The specific feed item that was previewed. Can represent either a product (with optional variant) or content. */
    function setItem(FeedItem $item)
    {
        $this->item = $item;
        return $this;
    }
}
