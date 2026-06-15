<?php declare(strict_types=1);

namespace Relewise\Models;

/** Response containing a single stored feed configuration. */
class FeedConfigurationResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Feed.FeedConfigurationResponse, Relewise.Client";
    /** The retrieved feed configuration. */
    public FeedConfiguration $configuration;
    
    public static function create(FeedConfiguration $configuration) : FeedConfigurationResponse
    {
        $result = new FeedConfigurationResponse();
        $result->configuration = $configuration;
        return $result;
    }
    
    public static function hydrate(array $arr) : FeedConfigurationResponse
    {
        $result = TimedResponse::hydrateBase(new FeedConfigurationResponse(), $arr);
        if (array_key_exists("configuration", $arr))
        {
            $result->configuration = FeedConfiguration::hydrate($arr["configuration"]);
        }
        return $result;
    }
    
    /** The retrieved feed configuration. */
    function setConfiguration(FeedConfiguration $configuration)
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
