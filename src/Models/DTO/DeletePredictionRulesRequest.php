<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class DeletePredictionRulesRequest extends DeleteSearchRulesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Rules.DeletePredictionRulesRequest, Relewise.Client";
    public static function create() : DeletePredictionRulesRequest
    {
        $result = new DeletePredictionRulesRequest();
        return $result;
    }
    public static function hydrate(array $arr) : DeletePredictionRulesRequest
    {
        $result = DeleteSearchRulesRequest::hydrateBase(new DeletePredictionRulesRequest(), $arr);
        return $result;
    }
    function setIds(string ... $ids)
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
