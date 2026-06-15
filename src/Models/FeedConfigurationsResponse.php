<?php declare(strict_types=1);

namespace Relewise\Models;

/** Response containing all stored feed configurations. */
class FeedConfigurationsResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Feed.FeedConfigurationsResponse, Relewise.Client";
    /** The stored feed configurations returned by the request. */
    public array $configurations;
    
    public static function create(FeedConfiguration ... $configurations) : FeedConfigurationsResponse
    {
        $result = new FeedConfigurationsResponse();
        $result->configurations = $configurations;
        return $result;
    }
    
    public static function hydrate(array $arr) : FeedConfigurationsResponse
    {
        $result = TimedResponse::hydrateBase(new FeedConfigurationsResponse(), $arr);
        if (array_key_exists("configurations", $arr))
        {
            $result->configurations = array();
            foreach($arr["configurations"] as &$value)
            {
                array_push($result->configurations, FeedConfiguration::hydrate($value));
            }
        }
        return $result;
    }
    
    /** The stored feed configurations returned by the request. */
    function setConfigurations(FeedConfiguration ... $configurations)
    {
        $this->configurations = $configurations;
        return $this;
    }
    
    /**
     * The stored feed configurations returned by the request.
     * @param FeedConfiguration[] $configurations new value.
     */
    function setConfigurationsFromArray(array $configurations)
    {
        $this->configurations = $configurations;
        return $this;
    }
    
    /** The stored feed configurations returned by the request. */
    function addToConfigurations(FeedConfiguration $configurations)
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
