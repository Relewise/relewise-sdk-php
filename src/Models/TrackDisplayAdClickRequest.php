<?php declare(strict_types=1);

namespace Relewise\Models;

class TrackDisplayAdClickRequest extends TrackingRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Tracking.TrackDisplayAdClickRequest, Relewise.Client";
    public DisplayAdClick $displayAdClick;
    
    public static function create(DisplayAdClick $displayAdClick) : TrackDisplayAdClickRequest
    {
        $result = new TrackDisplayAdClickRequest();
        $result->displayAdClick = $displayAdClick;
        return $result;
    }
    
    public static function hydrate(array $arr) : TrackDisplayAdClickRequest
    {
        $result = TrackingRequest::hydrateBase(new TrackDisplayAdClickRequest(), $arr);
        if (array_key_exists("displayAdClick", $arr))
        {
            $result->displayAdClick = DisplayAdClick::hydrate($arr["displayAdClick"]);
        }
        return $result;
    }
    
    function setDisplayAdClick(DisplayAdClick $displayAdClick)
    {
        $this->displayAdClick = $displayAdClick;
        return $this;
    }
}
