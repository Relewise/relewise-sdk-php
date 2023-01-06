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
