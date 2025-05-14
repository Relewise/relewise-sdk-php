<?php declare(strict_types=1);

namespace Relewise\Models;

class GlobalRetailMediaConfigurationResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.RetailMedia.GlobalRetailMediaConfigurationResponse, Relewise.Client";
    public GlobalRetailMediaConfiguration $configuration;
    
    public static function create(GlobalRetailMediaConfiguration $configuration) : GlobalRetailMediaConfigurationResponse
    {
        $result = new GlobalRetailMediaConfigurationResponse();
        $result->configuration = $configuration;
        return $result;
    }
    
    public static function hydrate(array $arr) : GlobalRetailMediaConfigurationResponse
    {
        $result = TimedResponse::hydrateBase(new GlobalRetailMediaConfigurationResponse(), $arr);
        if (array_key_exists("configuration", $arr))
        {
            $result->configuration = GlobalRetailMediaConfiguration::hydrate($arr["configuration"]);
        }
        return $result;
    }
    
    function setConfiguration(GlobalRetailMediaConfiguration $configuration)
    {
        $this->configuration = $configuration;
        return $this;
    }
    
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
