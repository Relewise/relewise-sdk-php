<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class TrackCompanyUpdateRequest extends TrackingRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Tracking.TrackCompanyUpdateRequest, Relewise.Client";
    public CompanyUpdate $companyUpdate;
    public static function create(CompanyUpdate $companyUpdate) : TrackCompanyUpdateRequest
    {
        $result = new TrackCompanyUpdateRequest();
        $result->companyUpdate = $companyUpdate;
        return $result;
    }
    public static function hydrate(array $arr) : TrackCompanyUpdateRequest
    {
        $result = TrackingRequest::hydrateBase(new TrackCompanyUpdateRequest(), $arr);
        if (array_key_exists("companyUpdate", $arr))
        {
            $result->companyUpdate = CompanyUpdate::hydrate($arr["companyUpdate"]);
        }
        return $result;
    }
    function setCompanyUpdate(CompanyUpdate $companyUpdate)
    {
        $this->companyUpdate = $companyUpdate;
        return $this;
    }
}
