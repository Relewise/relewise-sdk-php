<?php declare(strict_types=1);

namespace Relewise\Models;

class TrackFeedDwellRequest extends TrackingRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Tracking.Feed.TrackFeedDwellRequest, Relewise.Client";
    public FeedDwell $dwell;
    
    public static function create(FeedDwell $dwell) : TrackFeedDwellRequest
    {
        $result = new TrackFeedDwellRequest();
        $result->dwell = $dwell;
        return $result;
    }
    
    public static function hydrate(array $arr) : TrackFeedDwellRequest
    {
        $result = TrackingRequest::hydrateBase(new TrackFeedDwellRequest(), $arr);
        if (array_key_exists("dwell", $arr))
        {
            $result->dwell = FeedDwell::hydrate($arr["dwell"]);
        }
        return $result;
    }
    
    function setDwell(FeedDwell $dwell)
    {
        $this->dwell = $dwell;
        return $this;
    }
}
