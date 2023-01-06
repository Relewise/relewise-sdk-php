<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

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
    function withContentUpdate(ContentUpdate $contentUpdate)
    {
        $this->contentUpdate = $contentUpdate;
        return $this;
    }
    function withCustom(string $key, string $value)
    {
        if (!isset($this->custom))
        {
            $this->custom = array();
        }
        $this->custom[$key] = $value;
        return $this;
    }
}
