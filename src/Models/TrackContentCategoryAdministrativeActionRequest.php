<?php declare(strict_types=1);

namespace Relewise\Models;

class TrackContentCategoryAdministrativeActionRequest extends TrackingRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Tracking.TrackContentCategoryAdministrativeActionRequest, Relewise.Client";
    
    public ContentCategoryAdministrativeAction $administrativeAction;
    
    public static function create(ContentCategoryAdministrativeAction $administrativeAction) : TrackContentCategoryAdministrativeActionRequest
    {
        $result = new TrackContentCategoryAdministrativeActionRequest();
        $result->administrativeAction = $administrativeAction;
        return $result;
    }
    
    public static function hydrate(array $arr) : TrackContentCategoryAdministrativeActionRequest
    {
        $result = TrackingRequest::hydrateBase(new TrackContentCategoryAdministrativeActionRequest(), $arr);
        if (array_key_exists("administrativeAction", $arr))
        {
            $result->administrativeAction = ContentCategoryAdministrativeAction::hydrate($arr["administrativeAction"]);
        }
        return $result;
    }
    
    function setAdministrativeAction(ContentCategoryAdministrativeAction $administrativeAction)
    {
        $this->administrativeAction = $administrativeAction;
        return $this;
    }
}
