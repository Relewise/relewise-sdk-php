<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class DeleteStemmingRulesRequest extends DeleteSearchRulesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Rules.DeleteStemmingRulesRequest, Relewise.Client";
    public static function create(string $deletedBy) : DeleteStemmingRulesRequest
    {
        $result = new DeleteStemmingRulesRequest();
        $result->deletedBy = $deletedBy;
        return $result;
    }
    public static function hydrate(array $arr) : DeleteStemmingRulesRequest
    {
        $result = DeleteSearchRulesRequest::hydrateBase(new DeleteStemmingRulesRequest(), $arr);
        return $result;
    }
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
    function setDeletedBy(string $deletedBy)
    {
        $this->deletedBy = $deletedBy;
        return $this;
    }
}
