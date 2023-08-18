<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class DeleteSearchRulesRequest extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Rules.DeleteSearchRulesRequest, Relewise.Client";
    public array $ids;
    public string $deletedBy;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.Search.Rules.DeleteDecompoundRulesRequest, Relewise.Client")
        {
            return DeleteDecompoundRulesRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.Rules.DeletePredictionRulesRequest, Relewise.Client")
        {
            return DeletePredictionRulesRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.Rules.DeleteRedirectRulesRequest, Relewise.Client")
        {
            return DeleteRedirectRulesRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.Rules.DeleteStemmingRulesRequest, Relewise.Client")
        {
            return DeleteStemmingRulesRequest::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = LicensedRequest::hydrateBase($result, $arr);
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
