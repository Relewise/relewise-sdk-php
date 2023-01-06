<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class SaveGlobalTriggerConfigurationRequest extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Triggers.SaveGlobalTriggerConfigurationRequest, Relewise.Client";
    public GlobalTriggerConfiguration $configuration;
    public string $modifiedBy;
    public static function create(GlobalTriggerConfiguration $configuration, string $modifiedBy) : SaveGlobalTriggerConfigurationRequest
    {
        $result = new SaveGlobalTriggerConfigurationRequest();
        $result->configuration = $configuration;
        $result->modifiedBy = $modifiedBy;
        return $result;
    }
    public static function hydrate(array $arr) : SaveGlobalTriggerConfigurationRequest
    {
        $result = LicensedRequest::hydrateBase(new SaveGlobalTriggerConfigurationRequest(), $arr);
        if (array_key_exists("configuration", $arr))
        {
            $result->configuration = GlobalTriggerConfiguration::hydrate($arr["configuration"]);
        }
        if (array_key_exists("modifiedBy", $arr))
        {
            $result->modifiedBy = $arr["modifiedBy"];
        }
        return $result;
    }
    function withConfiguration(GlobalTriggerConfiguration $configuration)
    {
        $this->configuration = $configuration;
        return $this;
    }
    function withModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
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
