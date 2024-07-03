<?php declare(strict_types=1);

namespace Relewise\Models;

class TrackProductAdministrativeActionRequest extends TrackingRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Tracking.TrackProductAdministrativeActionRequest, Relewise.Client";
    public ProductAdministrativeAction $administrativeAction;
    public static function create(ProductAdministrativeAction $administrativeAction) : TrackProductAdministrativeActionRequest
    {
        $result = new TrackProductAdministrativeActionRequest();
        $result->administrativeAction = $administrativeAction;
        return $result;
    }
    public static function hydrate(array $arr) : TrackProductAdministrativeActionRequest
    {
        $result = TrackingRequest::hydrateBase(new TrackProductAdministrativeActionRequest(), $arr);
        if (array_key_exists("administrativeAction", $arr))
        {
            $result->administrativeAction = ProductAdministrativeAction::hydrate($arr["administrativeAction"]);
        }
        return $result;
    }
    function setAdministrativeAction(ProductAdministrativeAction $administrativeAction)
    {
        $this->administrativeAction = $administrativeAction;
        return $this;
    }
}
