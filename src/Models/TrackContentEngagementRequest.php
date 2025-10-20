<?php declare(strict_types=1);

namespace Relewise\Models;

class TrackContentEngagementRequest extends TrackingRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Tracking.TrackContentEngagementRequest, Relewise.Client";
    public ContentEngagement $contentEngagement;
    
    public static function create(ContentEngagement $contentEngagement) : TrackContentEngagementRequest
    {
        $result = new TrackContentEngagementRequest();
        $result->contentEngagement = $contentEngagement;
        return $result;
    }
    
    public static function hydrate(array $arr) : TrackContentEngagementRequest
    {
        $result = TrackingRequest::hydrateBase(new TrackContentEngagementRequest(), $arr);
        if (array_key_exists("contentEngagement", $arr))
        {
            $result->contentEngagement = ContentEngagement::hydrate($arr["contentEngagement"]);
        }
        return $result;
    }
    
    function setContentEngagement(ContentEngagement $contentEngagement)
    {
        $this->contentEngagement = $contentEngagement;
        return $this;
    }
}
