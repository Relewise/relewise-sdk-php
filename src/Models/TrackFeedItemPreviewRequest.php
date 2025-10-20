<?php declare(strict_types=1);

namespace Relewise\Models;

class TrackFeedItemPreviewRequest extends TrackingRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Tracking.Feed.TrackFeedItemPreviewRequest, Relewise.Client";
    public FeedItemPreview $preview;
    
    public static function create(FeedItemPreview $preview) : TrackFeedItemPreviewRequest
    {
        $result = new TrackFeedItemPreviewRequest();
        $result->preview = $preview;
        return $result;
    }
    
    public static function hydrate(array $arr) : TrackFeedItemPreviewRequest
    {
        $result = TrackingRequest::hydrateBase(new TrackFeedItemPreviewRequest(), $arr);
        if (array_key_exists("preview", $arr))
        {
            $result->preview = FeedItemPreview::hydrate($arr["preview"]);
        }
        return $result;
    }
    
    function setPreview(FeedItemPreview $preview)
    {
        $this->preview = $preview;
        return $this;
    }
}
