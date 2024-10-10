<?php declare(strict_types=1);

namespace Relewise\Models;

class TriggerResultRequest extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Triggers.TriggerResultRequest, Relewise.Client";
    public string $configurationId;
    public static function create(string $configurationId) : TriggerResultRequest
    {
        $result = new TriggerResultRequest();
        $result->configurationId = $configurationId;
        return $result;
    }
    public static function hydrate(array $arr) : TriggerResultRequest
    {
        $result = LicensedRequest::hydrateBase(new TriggerResultRequest(), $arr);
        if (array_key_exists("configurationId", $arr))
        {
            $result->configurationId = $arr["configurationId"];
        }
        return $result;
    }
    
    function setConfigurationId(string $configurationId)
    {
        $this->configurationId = $configurationId;
        return $this;
    }
}
