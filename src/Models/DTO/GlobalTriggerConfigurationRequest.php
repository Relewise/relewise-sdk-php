<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class GlobalTriggerConfigurationRequest extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Triggers.GlobalTriggerConfigurationRequest, Relewise.Client";
    public static function create() : GlobalTriggerConfigurationRequest
    {
        $result = new GlobalTriggerConfigurationRequest();
        return $result;
    }
    public static function hydrate(array $arr) : GlobalTriggerConfigurationRequest
    {
        $result = LicensedRequest::hydrateBase(new GlobalTriggerConfigurationRequest(), $arr);
        return $result;
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
