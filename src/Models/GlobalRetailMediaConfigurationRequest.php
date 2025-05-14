<?php declare(strict_types=1);

namespace Relewise\Models;

class GlobalRetailMediaConfigurationRequest extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.RetailMedia.GlobalRetailMediaConfigurationRequest, Relewise.Client";
    public static function create() : GlobalRetailMediaConfigurationRequest
    {
        $result = new GlobalRetailMediaConfigurationRequest();
        return $result;
    }
    
    public static function hydrate(array $arr) : GlobalRetailMediaConfigurationRequest
    {
        $result = LicensedRequest::hydrateBase(new GlobalRetailMediaConfigurationRequest(), $arr);
        return $result;
    }
}
