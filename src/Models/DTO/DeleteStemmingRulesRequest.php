<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class DeleteStemmingRulesRequest extends DeleteSearchRulesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Rules.DeleteStemmingRulesRequest, Relewise.Client";
    public static function create() : DeleteStemmingRulesRequest
    {
        $result = new DeleteStemmingRulesRequest();
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
    function setDeletedBy(string $deletedBy)
    {
        $this->deletedBy = $deletedBy;
        return $this;
    }
}
