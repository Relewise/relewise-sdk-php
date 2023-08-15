<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class TriggerConfigurationCollectionResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.TriggerConfigurationCollectionResponse, Relewise.Client";
    public array $configurations;
    public static function create() : TriggerConfigurationCollectionResponse
    {
        $result = new TriggerConfigurationCollectionResponse();
        return $result;
    }
    public static function hydrate(array $arr) : TriggerConfigurationCollectionResponse
    {
        $result = TimedResponse::hydrateBase(new TriggerConfigurationCollectionResponse(), $arr);
        if (array_key_exists("configurations", $arr))
        {
            $result->configurations = array();
            foreach($arr["configurations"] as &$value)
            {
                array_push($result->configurations, TriggerConfiguration::hydrate($value));
            }
        }
        return $result;
    }
    /**
     * Sets configurations to a new value.
     * @param TriggerConfiguration[] $configurations new value.
     */
    function setConfigurations(TriggerConfiguration ... $configurations)
    {
        $this->configurations = $configurations;
        return $this;
    }
    /**
     * Sets configurations to a new value from an array.
     * @param TriggerConfiguration[] $configurations new value.
     */
    function setConfigurationsFromArray(array $configurations)
    {
        $this->configurations = $configurations;
        return $this;
    }
    /**
     * Adds a new element to configurations.
     * @param TriggerConfiguration $configurations new element.
     */
    function addToConfigurations(TriggerConfiguration $configurations)
    {
        if (!isset($this->configurations))
        {
            $this->configurations = array();
        }
        array_push($this->configurations, $configurations);
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
