<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class TrackContentCategoryUpdateRequest extends TrackingRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Tracking.TrackContentCategoryUpdateRequest, Relewise.Client";
    public ContentCategoryUpdate $contentCategoryUpdate;
    public static function create(ContentCategoryUpdate $contentCategoryUpdate) : TrackContentCategoryUpdateRequest
    {
        $result = new TrackContentCategoryUpdateRequest();
        $result->contentCategoryUpdate = $contentCategoryUpdate;
        return $result;
    }
    public static function hydrate(array $arr) : TrackContentCategoryUpdateRequest
    {
        $result = TrackingRequest::hydrateBase(new TrackContentCategoryUpdateRequest(), $arr);
        if (array_key_exists("contentCategoryUpdate", $arr))
        {
            $result->contentCategoryUpdate = ContentCategoryUpdate::hydrate($arr["contentCategoryUpdate"]);
        }
        return $result;
    }
    function setContentCategoryUpdate(ContentCategoryUpdate $contentCategoryUpdate)
    {
        $this->contentCategoryUpdate = $contentCategoryUpdate;
        return $this;
    }
}
