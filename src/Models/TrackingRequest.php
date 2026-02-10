<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class TrackingRequest extends LicensedRequest
{
    public string $typeDefinition = "";
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.Tracking.BatchedTrackingRequest, Relewise.Client")
        {
            return BatchedTrackingRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackBrandAdministrativeActionRequest, Relewise.Client")
        {
            return TrackBrandAdministrativeActionRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackBrandUpdateRequest, Relewise.Client")
        {
            return TrackBrandUpdateRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackBrandViewRequest, Relewise.Client")
        {
            return TrackBrandViewRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackCartRequest, Relewise.Client")
        {
            return TrackCartRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackCompanyAdministrativeActionRequest, Relewise.Client")
        {
            return TrackCompanyAdministrativeActionRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackCompanyUpdateRequest, Relewise.Client")
        {
            return TrackCompanyUpdateRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackContentAdministrativeActionRequest, Relewise.Client")
        {
            return TrackContentAdministrativeActionRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackContentCategoryAdministrativeActionRequest, Relewise.Client")
        {
            return TrackContentCategoryAdministrativeActionRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackContentCategoryUpdateRequest, Relewise.Client")
        {
            return TrackContentCategoryUpdateRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackContentCategoryViewRequest, Relewise.Client")
        {
            return TrackContentCategoryViewRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackContentEngagementRequest, Relewise.Client")
        {
            return TrackContentEngagementRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackContentUpdateRequest, Relewise.Client")
        {
            return TrackContentUpdateRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackContentViewRequest, Relewise.Client")
        {
            return TrackContentViewRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackDisplayAdClickRequest, Relewise.Client")
        {
            return TrackDisplayAdClickRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackOrderRequest, Relewise.Client")
        {
            return TrackOrderRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackProductAdministrativeActionRequest, Relewise.Client")
        {
            return TrackProductAdministrativeActionRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackProductCategoryAdministrativeActionRequest, Relewise.Client")
        {
            return TrackProductCategoryAdministrativeActionRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackProductCategoryUpdateRequest, Relewise.Client")
        {
            return TrackProductCategoryUpdateRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackProductCategoryViewRequest, Relewise.Client")
        {
            return TrackProductCategoryViewRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackProductEngagementRequest, Relewise.Client")
        {
            return TrackProductEngagementRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackProductUpdateRequest, Relewise.Client")
        {
            return TrackProductUpdateRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackProductViewRequest, Relewise.Client")
        {
            return TrackProductViewRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackSearchTermRequest, Relewise.Client")
        {
            return TrackSearchTermRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackUserAdministrativeActionRequest, Relewise.Client")
        {
            return TrackUserAdministrativeActionRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackUserUpdateRequest, Relewise.Client")
        {
            return TrackUserUpdateRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.Feed.TrackFeedDwellRequest, Relewise.Client")
        {
            return TrackFeedDwellRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.Feed.TrackFeedItemClickRequest, Relewise.Client")
        {
            return TrackFeedItemClickRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.Feed.TrackFeedItemPreviewRequest, Relewise.Client")
        {
            return TrackFeedItemPreviewRequest::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = LicensedRequest::hydrateBase($result, $arr);
        return $result;
    }
}
