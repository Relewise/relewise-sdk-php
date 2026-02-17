<?php declare(strict_types=1);

namespace Relewise\Models;

class AbandonedSearchTriggerResultTriggerResultResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.TriggerResultResponse`1[[Relewise.Client.Responses.Triggers.Results.AbandonedSearchTriggerResult, Relewise.Client, Version=1.280.0.0, Culture=neutral, PublicKeyToken=null]], Relewise.Client";
    public AbandonedSearchTriggerResult $result;
    
    public static function create() : AbandonedSearchTriggerResultTriggerResultResponse
    {
        $result = new AbandonedSearchTriggerResultTriggerResultResponse();
        return $result;
    }
    
    public static function hydrate(array $arr) : AbandonedSearchTriggerResultTriggerResultResponse
    {
        $result = TimedResponse::hydrateBase(new AbandonedSearchTriggerResultTriggerResultResponse(), $arr);
        if (array_key_exists("result", $arr))
        {
            $result->result = AbandonedSearchTriggerResult::hydrate($arr["result"]);
        }
        return $result;
    }
    
    function setResult(AbandonedSearchTriggerResult $result)
    {
        $this->result = $result;
        return $this;
    }
    
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
