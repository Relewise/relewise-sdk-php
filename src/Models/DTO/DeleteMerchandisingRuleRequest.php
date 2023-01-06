<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class DeleteMerchandisingRuleRequest extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Merchandising.DeleteMerchandisingRuleRequest, Relewise.Client";
    public string $id;
    public static function create(string $id) : DeleteMerchandisingRuleRequest
    {
        $result = new DeleteMerchandisingRuleRequest();
        $result->id = $id;
        return $result;
    }
    public static function hydrate(array $arr) : DeleteMerchandisingRuleRequest
    {
        $result = LicensedRequest::hydrateBase(new DeleteMerchandisingRuleRequest(), $arr);
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
