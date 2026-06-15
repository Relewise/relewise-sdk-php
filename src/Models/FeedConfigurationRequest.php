<?php declare(strict_types=1);

namespace Relewise\Models;

/** Loads a single stored feed configuration. */
class FeedConfigurationRequest extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.Feed.FeedConfigurationRequest, Relewise.Client";
    /** The identifier of the configuration to load. */
    public string $configurationId;
    
    public static function create(string $configurationId) : FeedConfigurationRequest
    {
        $result = new FeedConfigurationRequest();
        $result->configurationId = $configurationId;
        return $result;
    }
    
    public static function hydrate(array $arr) : FeedConfigurationRequest
    {
        $result = LicensedRequest::hydrateBase(new FeedConfigurationRequest(), $arr);
        if (array_key_exists("configurationId", $arr))
        {
            $result->configurationId = $arr["configurationId"];
        }
        return $result;
    }
    
    /** The identifier of the configuration to load. */
    function setConfigurationId(string $configurationId)
    {
        $this->configurationId = $configurationId;
        return $this;
    }
}
