<?php declare(strict_types=1);

namespace Relewise\Models;

class VariantChangeTriggerResultTriggerResultResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.TriggerResultResponse`1[[Relewise.Client.Responses.Triggers.Results.VariantChangeTriggerResult, Relewise.Client, Version=1.280.0.0, Culture=neutral, PublicKeyToken=null]], Relewise.Client";
    public VariantChangeTriggerResult $result;
    
    public static function create() : VariantChangeTriggerResultTriggerResultResponse
    {
        $result = new VariantChangeTriggerResultTriggerResultResponse();
        return $result;
    }
    
    public static function hydrate(array $arr) : VariantChangeTriggerResultTriggerResultResponse
    {
        $result = TimedResponse::hydrateBase(new VariantChangeTriggerResultTriggerResultResponse(), $arr);
        if (array_key_exists("result", $arr))
        {
            $result->result = VariantChangeTriggerResult::hydrate($arr["result"]);
        }
        return $result;
    }
    
    function setResult(VariantChangeTriggerResult $result)
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
