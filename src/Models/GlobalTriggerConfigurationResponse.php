<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class GlobalTriggerConfigurationResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.GlobalTriggerConfigurationResponse, Relewise.Client";
    public GlobalTriggerConfiguration $configuration;
    public static function create() : GlobalTriggerConfigurationResponse
    {
        $result = new GlobalTriggerConfigurationResponse();
        return $result;
    }
    public static function hydrate(array $arr) : GlobalTriggerConfigurationResponse
    {
        $result = TimedResponse::hydrateBase(new GlobalTriggerConfigurationResponse(), $arr);
        if (array_key_exists("configuration", $arr))
        {
            $result->configuration = GlobalTriggerConfiguration::hydrate($arr["configuration"]);
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
     * Sets statistics to a new value.
     * @param Statistics $statistics new value.
     */
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
