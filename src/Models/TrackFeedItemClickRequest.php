<?php declare(strict_types=1);

namespace Relewise\Models;

class TrackFeedItemClickRequest extends TrackingRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Tracking.Feed.TrackFeedItemClickRequest, Relewise.Client";
    public FeedItemClick $click;
    
    public static function create(FeedItemClick $click) : TrackFeedItemClickRequest
    {
        $result = new TrackFeedItemClickRequest();
        $result->click = $click;
        return $result;
    }
    
    public static function hydrate(array $arr) : TrackFeedItemClickRequest
    {
        $result = TrackingRequest::hydrateBase(new TrackFeedItemClickRequest(), $arr);
        if (array_key_exists("click", $arr))
        {
            $result->click = FeedItemClick::hydrate($arr["click"]);
        }
        return $result;
    }
    
    function setClick(FeedItemClick $click)
    {
        $this->click = $click;
        return $this;
    }
}
