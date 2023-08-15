<?php declare(strict_types=1);

namespace Relewise\Models;

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
    /**
     * Sets configuration to a new value.
     * @param GlobalTriggerConfiguration $configuration new value.
     */
    function setConfiguration(GlobalTriggerConfiguration $configuration)
    {
        $this->configuration = $configuration;
        return $this;
    }
    /**
     * Sets modifiedBy to a new value.
     * @param string $modifiedBy new value.
     */
    function setModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
}
