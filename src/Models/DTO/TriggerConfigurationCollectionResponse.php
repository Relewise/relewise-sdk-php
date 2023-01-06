<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

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
    function withConfigurations(TriggerConfiguration ... $configurations)
    {
        $this->configurations = $configurations;
        return $this;
    }
    function withStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
