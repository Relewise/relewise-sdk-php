<?php declare(strict_types=1);

namespace Relewise\Models;

/** Represents an engagement (sentiment feedback, etc.) performed by a User on a specific content item. Instances are validated on construction and can be sent through the tracking API. */
class ContentEngagement extends Trackable
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ContentEngagement, Relewise.Client";
    /** The user associated with the engagement. */
    public ?User $user;
    /** The identifier of the content the engagement concerns. Must be non-null and non-empty. */
    public string $id;
    /** The engagement payload describing the sentiment/favorite signal for the content. */
    public ContentEngagementData $engagement;
    
    /** Initializes a new ContentEngagement. */
    public static function create(?User $user, string $id, ContentEngagementData $engagement) : ContentEngagement
    {
        $result = new ContentEngagement();
        $result->user = $user;
        $result->id = $id;
        $result->engagement = $engagement;
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentEngagement
    {
        $result = Trackable::hydrateBase(new ContentEngagement(), $arr);
        if (array_key_exists("user", $arr))
        {
            $result->user = User::hydrate($arr["user"]);
        }
        if (array_key_exists("id", $arr))
        {
            $result->id = $arr["id"];
        }
        if (array_key_exists("engagement", $arr))
        {
            $result->engagement = ContentEngagementData::hydrate($arr["engagement"]);
        }
        return $result;
    }
    
    /** The user associated with the engagement. */
    function setUser(?User $user)
    {
        $this->user = $user;
        return $this;
    }
    
    /** The identifier of the content the engagement concerns. Must be non-null and non-empty. */
    function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }
    
    /** The engagement payload describing the sentiment/favorite signal for the content. */
    function setEngagement(ContentEngagementData $engagement)
    {
        $this->engagement = $engagement;
        return $this;
    }
}
