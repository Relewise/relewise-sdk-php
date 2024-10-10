<?php declare(strict_types=1);

namespace Relewise\Models;

class TrackContentCategoryViewRequest extends TrackingRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Tracking.TrackContentCategoryViewRequest, Relewise.Client";
    
    public ContentCategoryView $contentCategoryView;
    public static function create(ContentCategoryView $contentCategoryView) : TrackContentCategoryViewRequest
    {
        $result = new TrackContentCategoryViewRequest();
        $result->contentCategoryView = $contentCategoryView;
        return $result;
    }
    
    public static function hydrate(array $arr) : TrackContentCategoryViewRequest
    {
        $result = TrackingRequest::hydrateBase(new TrackContentCategoryViewRequest(), $arr);
        if (array_key_exists("contentCategoryView", $arr))
        {
            $result->contentCategoryView = ContentCategoryView::hydrate($arr["contentCategoryView"]);
        }
        return $result;
    }
    
    function setContentCategoryView(ContentCategoryView $contentCategoryView)
    {
        $this->contentCategoryView = $contentCategoryView;
        return $this;
    }
}
