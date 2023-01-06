<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class MerchandisingRuleRequest extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Merchandising.MerchandisingRuleRequest, Relewise.Client";
    public string $id;
    public ?int $type;
    public static function create(string $id) : MerchandisingRuleRequest
    {
        $result = new MerchandisingRuleRequest();
        $result->id = $id;
        return $result;
    }
    public static function hydrate(array $arr) : MerchandisingRuleRequest
    {
        $result = LicensedRequest::hydrateBase(new MerchandisingRuleRequest(), $arr);
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
