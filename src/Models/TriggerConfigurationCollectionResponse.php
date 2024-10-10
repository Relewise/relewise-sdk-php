<?php declare(strict_types=1);

namespace Relewise\Models;

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
    
    function setConfigurations(TriggerConfiguration ... $configurations)
    {
        $this->configurations = $configurations;
        return $this;
    }
    
    /** @param TriggerConfiguration[] $configurations new value. */
    function setConfigurationsFromArray(array $configurations)
    {
        $this->configurations = $configurations;
        return $this;
    }
    
    function addToConfigurations(TriggerConfiguration $configurations)
    {
        if (!isset($this->configurations))
        {
            $this->configurations = array();
        }
        array_push($this->configurations, $configurations);
        return $this;
    }
    
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
