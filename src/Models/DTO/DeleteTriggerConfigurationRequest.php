<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class DeleteTriggerConfigurationRequest extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Triggers.DeleteTriggerConfigurationRequest, Relewise.Client";
    public string $id;
    public static function create(string $id) : DeleteTriggerConfigurationRequest
    {
        $result = new DeleteTriggerConfigurationRequest();
        $result->id = $id;
        return $result;
    }
    public static function hydrate(array $arr) : DeleteTriggerConfigurationRequest
    {
        $result = LicensedRequest::hydrateBase(new DeleteTriggerConfigurationRequest(), $arr);
        if (array_key_exists("id", $arr))
        {
            $result->id = $arr["id"];
        }
        return $result;
    }
    function withId(string $id)
    {
        $this->id = $id;
        return $this;
    }
}
