<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class TriggerConfigurationResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.TriggerConfigurationResponse, Relewise.Client";
    public TriggerConfiguration $configuration;
    public static function create() : TriggerConfigurationResponse
    {
        $result = new TriggerConfigurationResponse();
        return $result;
    }
    public static function hydrate(array $arr) : TriggerConfigurationResponse
    {
        $result = TimedResponse::hydrateBase(new TriggerConfigurationResponse(), $arr);
        if (array_key_exists("configuration", $arr))
        {
            $result->configuration = TriggerConfiguration::hydrate($arr["configuration"]);
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
     * Sets statistics to a new value.
     * @param Statistics $statistics new value.
     */
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
