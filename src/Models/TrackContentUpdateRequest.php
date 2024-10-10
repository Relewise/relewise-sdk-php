<?php declare(strict_types=1);

namespace Relewise\Models;

class TrackContentUpdateRequest extends TrackingRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Tracking.TrackContentUpdateRequest, Relewise.Client";
    public ContentUpdate $contentUpdate;
    
    public static function create(ContentUpdate $contentUpdate) : TrackContentUpdateRequest
    {
        $result = new TrackContentUpdateRequest();
        $result->contentUpdate = $contentUpdate;
        return $result;
    }
    
    public static function hydrate(array $arr) : TrackContentUpdateRequest
    {
        $result = TrackingRequest::hydrateBase(new TrackContentUpdateRequest(), $arr);
        if (array_key_exists("contentUpdate", $arr))
        {
            $result->contentUpdate = ContentUpdate::hydrate($arr["contentUpdate"]);
        }
        return $result;
    }
    
    function setContentUpdate(ContentUpdate $contentUpdate)
    {
        $this->contentUpdate = $contentUpdate;
        return $this;
    }
}
