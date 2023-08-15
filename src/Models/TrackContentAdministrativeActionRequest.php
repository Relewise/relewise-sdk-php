<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class TrackContentAdministrativeActionRequest extends TrackingRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Tracking.TrackContentAdministrativeActionRequest, Relewise.Client";
    public ContentAdministrativeAction $administrativeAction;
    public static function create(ContentAdministrativeAction $administrativeAction) : TrackContentAdministrativeActionRequest
    {
        $result = new TrackContentAdministrativeActionRequest();
        $result->administrativeAction = $administrativeAction;
        return $result;
    }
    public static function hydrate(array $arr) : TrackContentAdministrativeActionRequest
    {
        $result = TrackingRequest::hydrateBase(new TrackContentAdministrativeActionRequest(), $arr);
        if (array_key_exists("administrativeAction", $arr))
        {
            $result->administrativeAction = ContentAdministrativeAction::hydrate($arr["administrativeAction"]);
        }
        return $result;
    }
    /**
     * Sets administrativeAction to a new value.
     * @param ContentAdministrativeAction $administrativeAction new value.
     */
    function setAdministrativeAction(ContentAdministrativeAction $administrativeAction)
    {
        $this->administrativeAction = $administrativeAction;
        return $this;
    }
}
