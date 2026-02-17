<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductChangeTriggerResultTriggerResultResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.TriggerResultResponse`1[[Relewise.Client.Responses.Triggers.Results.ProductChangeTriggerResult, Relewise.Client, Version=1.280.0.0, Culture=neutral, PublicKeyToken=null]], Relewise.Client";
    public ProductChangeTriggerResult $result;
    
    public static function create() : ProductChangeTriggerResultTriggerResultResponse
    {
        $result = new ProductChangeTriggerResultTriggerResultResponse();
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductChangeTriggerResultTriggerResultResponse
    {
        $result = TimedResponse::hydrateBase(new ProductChangeTriggerResultTriggerResultResponse(), $arr);
        if (array_key_exists("result", $arr))
        {
            $result->result = ProductChangeTriggerResult::hydrate($arr["result"]);
        }
        return $result;
    }
    
    function setResult(ProductChangeTriggerResult $result)
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
