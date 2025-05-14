<?php declare(strict_types=1);

namespace Relewise\Models;

class SaveGlobalRetailMediaConfigurationRequest extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.RetailMedia.SaveGlobalRetailMediaConfigurationRequest, Relewise.Client";
    public ?GlobalRetailMediaConfiguration $configuration;
    public ?string $modifiedBy;
    
    public static function create(GlobalRetailMediaConfiguration $configuration, string $modifiedBy) : SaveGlobalRetailMediaConfigurationRequest
    {
        $result = new SaveGlobalRetailMediaConfigurationRequest();
        $result->configuration = $configuration;
        $result->modifiedBy = $modifiedBy;
        return $result;
    }
    
    public static function hydrate(array $arr) : SaveGlobalRetailMediaConfigurationRequest
    {
        $result = LicensedRequest::hydrateBase(new SaveGlobalRetailMediaConfigurationRequest(), $arr);
        if (array_key_exists("configuration", $arr))
        {
            $result->configuration = GlobalRetailMediaConfiguration::hydrate($arr["configuration"]);
        }
        if (array_key_exists("modifiedBy", $arr))
        {
            $result->modifiedBy = $arr["modifiedBy"];
        }
        return $result;
    }
    
    function setConfiguration(?GlobalRetailMediaConfiguration $configuration)
    {
        $this->configuration = $configuration;
        return $this;
    }
    
    function setModifiedBy(?string $modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
        return $this;
    }
}
