<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class DeleteSearchIndexRequest extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.DeleteSearchIndexRequest, Relewise.Client";
    public string $id;
    public string $deletedBy;
    public static function create(string $id, string $deletedBy) : DeleteSearchIndexRequest
    {
        $result = new DeleteSearchIndexRequest();
        $result->id = $id;
        $result->deletedBy = $deletedBy;
        return $result;
    }
    public static function hydrate(array $arr) : DeleteSearchIndexRequest
    {
        $result = LicensedRequest::hydrateBase(new DeleteSearchIndexRequest(), $arr);
        if (array_key_exists("id", $arr))
        {
            $result->id = $arr["id"];
        }
        if (array_key_exists("deletedBy", $arr))
        {
            $result->deletedBy = $arr["deletedBy"];
        }
        return $result;
    }
    function withId(string $id)
    {
        $this->id = $id;
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
