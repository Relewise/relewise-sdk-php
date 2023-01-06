<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class TrackBrandAdministrativeActionRequest extends TrackingRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Tracking.TrackBrandAdministrativeActionRequest, Relewise.Client";
    public BrandAdministrativeAction $administrativeAction;
    public static function create(BrandAdministrativeAction $administrativeAction) : TrackBrandAdministrativeActionRequest
    {
        $result = new TrackBrandAdministrativeActionRequest();
        $result->administrativeAction = $administrativeAction;
        return $result;
    }
    public static function hydrate(array $arr) : TrackBrandAdministrativeActionRequest
    {
        $result = TrackingRequest::hydrateBase(new TrackBrandAdministrativeActionRequest(), $arr);
        if (array_key_exists("administrativeAction", $arr))
        {
            $result->administrativeAction = BrandAdministrativeAction::hydrate($arr["administrativeAction"]);
        }
        return $result;
    }
    function withAdministrativeAction(BrandAdministrativeAction $administrativeAction)
    {
        $this->administrativeAction = $administrativeAction;
        return $this;
    }
    function withCustom(string $key, string $value)
    {
        if (!isset($this->custom))
        {
            $this->custom = array();
        }
        $this->custom[$key] = $value;
        return $this;
    }
}
