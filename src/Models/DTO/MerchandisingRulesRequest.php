<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class MerchandisingRulesRequest extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Merchandising.MerchandisingRulesRequest, Relewise.Client";
    public ?int $type;
    public static function create() : MerchandisingRulesRequest
    {
        $result = new MerchandisingRulesRequest();
        return $result;
    }
    public static function hydrate(array $arr) : MerchandisingRulesRequest
    {
        $result = LicensedRequest::hydrateBase(new MerchandisingRulesRequest(), $arr);
        if (array_key_exists("type", $arr))
        {
            $result->type = $arr["type"];
        }
        return $result;
    }
    function withType(?int $type)
    {
        $this->type = $type;
        return $this;
    }
}
