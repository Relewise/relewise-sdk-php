<?php declare(strict_types=1);

namespace Relewise\Models;

/** Deletes a stored feed configuration. */
class DeleteFeedConfigurationRequest extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.Feed.DeleteFeedConfigurationRequest, Relewise.Client";
    /** The identifier of the configuration to delete. */
    public string $configurationId;
    /** The user or system that deleted the configuration. */
    public string $deletedBy;
    
    public static function create(string $configurationId, string $deletedBy) : DeleteFeedConfigurationRequest
    {
        $result = new DeleteFeedConfigurationRequest();
        $result->configurationId = $configurationId;
        $result->deletedBy = $deletedBy;
        return $result;
    }
    
    public static function hydrate(array $arr) : DeleteFeedConfigurationRequest
    {
        $result = LicensedRequest::hydrateBase(new DeleteFeedConfigurationRequest(), $arr);
        if (array_key_exists("configurationId", $arr))
        {
            $result->configurationId = $arr["configurationId"];
        }
        if (array_key_exists("deletedBy", $arr))
        {
            $result->deletedBy = $arr["deletedBy"];
        }
        return $result;
    }
    
    /** The identifier of the configuration to delete. */
    function setConfigurationId(string $configurationId)
    {
        $this->configurationId = $configurationId;
        return $this;
    }
    
    /** The user or system that deleted the configuration. */
    function setDeletedBy(string $deletedBy)
    {
        $this->deletedBy = $deletedBy;
        return $this;
    }
}
