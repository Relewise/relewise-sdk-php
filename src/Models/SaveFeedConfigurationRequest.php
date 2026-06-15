<?php declare(strict_types=1);

namespace Relewise\Models;

/** Saves a feed configuration under the specified identifier. */
class SaveFeedConfigurationRequest extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.Feed.SaveFeedConfigurationRequest, Relewise.Client";
    /** The feed configuration to save. */
    public FeedConfiguration $configuration;
    /** The user or system that modified the configuration. */
    public string $modifiedBy;
    
    public static function create(FeedConfiguration $configuration, string $modifiedBy) : SaveFeedConfigurationRequest
    {
        $result = new SaveFeedConfigurationRequest();
        $result->configuration = $configuration;
        $result->modifiedBy = $modifiedBy;
        return $result;
    }
    
    public static function hydrate(array $arr) : SaveFeedConfigurationRequest
    {
        $result = LicensedRequest::hydrateBase(new SaveFeedConfigurationRequest(), $arr);
        if (array_key_exists("configuration", $arr))
        {
            $result->configuration = FeedConfiguration::hydrate($arr["configuration"]);
        }
        if (array_key_exists("modifiedBy", $arr))
        {
            $result->modifiedBy = $arr["modifiedBy"];
        }
        return $result;
    }
    
    /** The feed configuration to save. */
    function setConfiguration(FeedConfiguration $configuration)
    {
        $this->configuration = $configuration;
        return $this;
    }
    
    /** The user or system that modified the configuration. */
    function setModifiedBy(string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
}
