<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class TriggerConfigurationRequest extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Triggers.TriggerConfigurationRequest, Relewise.Client";
    public string $id;
    public ?int $type;
    public static function create(string $id) : TriggerConfigurationRequest
    {
        $result = new TriggerConfigurationRequest();
        $result->id = $id;
        return $result;
    }
    public static function hydrate(array $arr) : TriggerConfigurationRequest
    {
        $result = LicensedRequest::hydrateBase(new TriggerConfigurationRequest(), $arr);
        if (array_key_exists("id", $arr))
        {
            $result->id = $arr["id"];
        }
        if (array_key_exists("type", $arr))
        {
            $result->type = $arr["type"];
        }
        return $result;
    }
    function withId(string $id)
    {
        $this->id = $id;
        return $this;
    }
    function withType(?int $type)
    {
        $this->type = $type;
        return $this;
    }
    function withCustom(string $key, string $value)
    {
        if (!isset($this->custom))
        {
            $this->custom = array();
        }
        $this->custom[$key] = $value;
        return $this;
    }
}
