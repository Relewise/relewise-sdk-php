<?php declare(strict_types=1);

namespace Relewise\Models;

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
    /**
     * Sets id to a new value.
     * @param string $id new value.
     */
    function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }
    /**
     * Sets deletedBy to a new value.
     * @param string $deletedBy new value.
     */
    function setDeletedBy(string $deletedBy)
    {
        $this->deletedBy = $deletedBy;
        return $this;
    }
}
