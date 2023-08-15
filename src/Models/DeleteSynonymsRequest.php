<?php declare(strict_types=1);

namespace Relewise\Models;

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
    /**
     * Sets ids to a new value.
     * @param string[] $ids new value.
     */
    function setIds(string ... $ids)
    {
        $this->ids = $ids;
        return $this;
    }
    /**
     * Sets ids to a new value from an array.
     * @param string[] $ids new value.
     */
    function setIdsFromArray(array $ids)
    {
        $this->ids = $ids;
        return $this;
    }
    /**
     * Adds a new element to ids.
     * @param string $ids new element.
     */
    function addToIds(string $ids)
    {
        if (!isset($this->ids))
        {
            $this->ids = array();
        }
        array_push($this->ids, $ids);
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
