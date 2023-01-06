<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class TrackProductCategoryAdministrativeActionRequest extends TrackingRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Tracking.TrackProductCategoryAdministrativeActionRequest, Relewise.Client";
    public ProductCategoryAdministrativeAction $administrativeAction;
    public static function create(ProductCategoryAdministrativeAction $administrativeAction) : TrackProductCategoryAdministrativeActionRequest
    {
        $result = new TrackProductCategoryAdministrativeActionRequest();
        $result->administrativeAction = $administrativeAction;
        return $result;
    }
    public static function hydrate(array $arr) : TrackProductCategoryAdministrativeActionRequest
    {
        $result = TrackingRequest::hydrateBase(new TrackProductCategoryAdministrativeActionRequest(), $arr);
        if (array_key_exists("administrativeAction", $arr))
        {
            $result->administrativeAction = ProductCategoryAdministrativeAction::hydrate($arr["administrativeAction"]);
        }
        return $result;
    }
    function setAdministrativeAction(ProductCategoryAdministrativeAction $administrativeAction)
    {
        $this->administrativeAction = $administrativeAction;
        return $this;
    }
}
