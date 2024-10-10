<?php declare(strict_types=1);

namespace Relewise\Models;

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
