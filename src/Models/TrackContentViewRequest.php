<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class TrackContentViewRequest extends TrackingRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Tracking.TrackContentViewRequest, Relewise.Client";
    public ContentView $contentView;
    public static function create(ContentView $contentView) : TrackContentViewRequest
    {
        $result = new TrackContentViewRequest();
        $result->contentView = $contentView;
        return $result;
    }
    public static function hydrate(array $arr) : TrackContentViewRequest
    {
        $result = TrackingRequest::hydrateBase(new TrackContentViewRequest(), $arr);
        if (array_key_exists("contentView", $arr))
        {
            $result->contentView = ContentView::hydrate($arr["contentView"]);
        }
        return $result;
    }
    /**
     * Sets contentView to a new value.
     * @param ContentView $contentView new value.
     */
    function setContentView(ContentView $contentView)
    {
        $this->contentView = $contentView;
        return $this;
    }
}
