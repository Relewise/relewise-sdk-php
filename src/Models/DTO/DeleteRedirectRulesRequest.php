<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class DeleteRedirectRulesRequest extends DeleteSearchRulesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Rules.DeleteRedirectRulesRequest, Relewise.Client";
    public static function create() : DeleteRedirectRulesRequest
    {
        $result = new DeleteRedirectRulesRequest();
        return $result;
    }
    public static function hydrate(array $arr) : DeleteRedirectRulesRequest
    {
        $result = DeleteSearchRulesRequest::hydrateBase(new DeleteRedirectRulesRequest(), $arr);
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
