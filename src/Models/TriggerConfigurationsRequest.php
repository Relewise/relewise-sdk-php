<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class TriggerConfigurationsRequest extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Triggers.TriggerConfigurationsRequest, Relewise.Client";
    public ?int $type;
    public static function create() : TriggerConfigurationsRequest
    {
        $result = new TriggerConfigurationsRequest();
        return $result;
    }
    public static function hydrate(array $arr) : TriggerConfigurationsRequest
    {
        $result = LicensedRequest::hydrateBase(new TriggerConfigurationsRequest(), $arr);
        if (array_key_exists("type", $arr))
        {
            $result->type = $arr["type"];
        }
        return $result;
    }
    function setType(?int $type)
    {
        $this->type = $type;
        return $this;
    }
}
