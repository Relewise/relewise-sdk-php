<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class SaveTriggerConfigurationRequest extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Triggers.SaveTriggerConfigurationRequest, Relewise.Client";
    public TriggerConfiguration $configuration;
    public string $modifiedBy;
    public static function create(TriggerConfiguration $configuration, string $modifiedBy) : SaveTriggerConfigurationRequest
    {
        $result = new SaveTriggerConfigurationRequest();
        $result->configuration = $configuration;
        $result->modifiedBy = $modifiedBy;
        return $result;
    }
    public static function hydrate(array $arr) : SaveTriggerConfigurationRequest
    {
        $result = LicensedRequest::hydrateBase(new SaveTriggerConfigurationRequest(), $arr);
        if (array_key_exists("configuration", $arr))
        {
            $result->configuration = TriggerConfiguration::hydrate($arr["configuration"]);
        }
        if (array_key_exists("modifiedBy", $arr))
        {
            $result->modifiedBy = $arr["modifiedBy"];
        }
        return $result;
    }
    /**
     * Sets configuration to a new value.
     * @param TriggerConfiguration $configuration new value.
     */
    function setConfiguration(TriggerConfiguration $configuration)
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
