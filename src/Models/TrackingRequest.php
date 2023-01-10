<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class TrackingRequest extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Tracking.TrackingRequest, Relewise.Client";
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
        if ($type=="Relewise.Client.Requests.Tracking.TrackContentUpdateRequest, Relewise.Client")
        {
            return TrackContentUpdateRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackContentViewRequest, Relewise.Client")
        {
            return TrackContentViewRequest::hydrate($arr);
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
        if ($type=="Relewise.Client.Requests.Tracking.TrackUserUpdateRequest, Relewise.Client")
        {
            return TrackUserUpdateRequest::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = LicensedRequest::hydrateBase($result, $arr);
        return $result;
    }
}
