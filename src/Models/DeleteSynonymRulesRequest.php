<?php declare(strict_types=1);

namespace Relewise\Models;

/** Deletes one or more synonym rules. */
class DeleteSynonymRulesRequest extends DeleteSearchRulesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Rules.DeleteSynonymRulesRequest, Relewise.Client";
    public static function create(string $deletedBy) : DeleteSynonymRulesRequest
    {
        $result = new DeleteSynonymRulesRequest();
        $result->deletedBy = $deletedBy;
        return $result;
    }
    
    public static function hydrate(array $arr) : DeleteSynonymRulesRequest
    {
        $result = DeleteSearchRulesRequest::hydrateBase(new DeleteSynonymRulesRequest(), $arr);
        return $result;
    }
    
    function setIds(string ... $ids)
    {
        $this->ids = $ids;
        return $this;
    }
    
    /** @param string[] $ids new value. */
    function setIdsFromArray(array $ids)
    {
        $this->ids = $ids;
        return $this;
    }
    
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
