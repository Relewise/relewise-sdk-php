<?php declare(strict_types=1);

namespace Relewise\Models;

class TrackUserAdministrativeActionRequest extends TrackingRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Tracking.TrackUserAdministrativeActionRequest, Relewise.Client";
    public UserAdministrativeAction $administrativeAction;
    
    public static function create(UserAdministrativeAction $administrativeAction) : TrackUserAdministrativeActionRequest
    {
        $result = new TrackUserAdministrativeActionRequest();
        $result->administrativeAction = $administrativeAction;
        return $result;
    }
    
    public static function hydrate(array $arr) : TrackUserAdministrativeActionRequest
    {
        $result = TrackingRequest::hydrateBase(new TrackUserAdministrativeActionRequest(), $arr);
        if (array_key_exists("administrativeAction", $arr))
        {
            $result->administrativeAction = UserAdministrativeAction::hydrate($arr["administrativeAction"]);
        }
        return $result;
    }
    
    function setAdministrativeAction(UserAdministrativeAction $administrativeAction)
    {
        $this->administrativeAction = $administrativeAction;
        return $this;
    }
}
