<?php declare(strict_types=1);

namespace Relewise\Models;

class TrackCompanyAdministrativeActionRequest extends TrackingRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Tracking.TrackCompanyAdministrativeActionRequest, Relewise.Client";
    public CompanyAdministrativeAction $administrativeAction;
    public static function create(CompanyAdministrativeAction $administrativeAction) : TrackCompanyAdministrativeActionRequest
    {
        $result = new TrackCompanyAdministrativeActionRequest();
        $result->administrativeAction = $administrativeAction;
        return $result;
    }
    public static function hydrate(array $arr) : TrackCompanyAdministrativeActionRequest
    {
        $result = TrackingRequest::hydrateBase(new TrackCompanyAdministrativeActionRequest(), $arr);
        if (array_key_exists("administrativeAction", $arr))
        {
            $result->administrativeAction = CompanyAdministrativeAction::hydrate($arr["administrativeAction"]);
        }
        return $result;
    }
    function setAdministrativeAction(CompanyAdministrativeAction $administrativeAction)
    {
        $this->administrativeAction = $administrativeAction;
        return $this;
    }
}
