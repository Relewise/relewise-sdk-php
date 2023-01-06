<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class DeleteSynonymsRequest extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.DeleteSynonymsRequest, Relewise.Client";
    public array $ids;
    public string $deletedBy;
    public static function create(array $ids, string $deletedBy) : DeleteSynonymsRequest
    {
        $result = new DeleteSynonymsRequest();
        $result->ids = $ids;
        $result->deletedBy = $deletedBy;
        return $result;
    }
    public static function hydrate(array $arr) : DeleteSynonymsRequest
    {
        $result = LicensedRequest::hydrateBase(new DeleteSynonymsRequest(), $arr);
        if (array_key_exists("ids", $arr))
        {
            $result->ids = array();
            foreach($arr["ids"] as &$value)
            {
                array_push($result->ids, $value);
            }
        }
        if (array_key_exists("deletedBy", $arr))
        {
            $result->deletedBy = $arr["deletedBy"];
        }
        return $result;
    }
    function withIds(string ... $ids)
    {
        $this->ids = $ids;
        return $this;
    }
    function withDeletedBy(string $deletedBy)
    {
        $this->deletedBy = $deletedBy;
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
