<?php declare(strict_types=1);

namespace Relewise\Models;

class AbandonedCartTriggerResultTriggerResultResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.TriggerResultResponse`1[[Relewise.Client.Responses.Triggers.Results.AbandonedCartTriggerResult, Relewise.Client, Version=1.280.0.0, Culture=neutral, PublicKeyToken=null]], Relewise.Client";
    public AbandonedCartTriggerResult $result;
    
    public static function create() : AbandonedCartTriggerResultTriggerResultResponse
    {
        $result = new AbandonedCartTriggerResultTriggerResultResponse();
        return $result;
    }
    
    public static function hydrate(array $arr) : AbandonedCartTriggerResultTriggerResultResponse
    {
        $result = TimedResponse::hydrateBase(new AbandonedCartTriggerResultTriggerResultResponse(), $arr);
        if (array_key_exists("result", $arr))
        {
            $result->result = AbandonedCartTriggerResult::hydrate($arr["result"]);
        }
        return $result;
    }
    
    function setResult(AbandonedCartTriggerResult $result)
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
