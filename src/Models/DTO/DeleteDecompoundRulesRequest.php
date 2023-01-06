<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class DeleteDecompoundRulesRequest extends DeleteSearchRulesRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Rules.DeleteDecompoundRulesRequest, Relewise.Client";
    public static function create() : DeleteDecompoundRulesRequest
    {
        $result = new DeleteDecompoundRulesRequest();
        return $result;
    }
    public static function hydrate(array $arr) : DeleteDecompoundRulesRequest
    {
        $result = DeleteSearchRulesRequest::hydrateBase(new DeleteDecompoundRulesRequest(), $arr);
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
}
