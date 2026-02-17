<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductInterestTriggerResultTriggerResultResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.TriggerResultResponse`1[[Relewise.Client.Responses.Triggers.Results.ProductInterestTriggerResult, Relewise.Client, Version=1.280.0.0, Culture=neutral, PublicKeyToken=null]], Relewise.Client";
    public ProductInterestTriggerResult $result;
    
    public static function create() : ProductInterestTriggerResultTriggerResultResponse
    {
        $result = new ProductInterestTriggerResultTriggerResultResponse();
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductInterestTriggerResultTriggerResultResponse
    {
        $result = TimedResponse::hydrateBase(new ProductInterestTriggerResultTriggerResultResponse(), $arr);
        if (array_key_exists("result", $arr))
        {
            $result->result = ProductInterestTriggerResult::hydrate($arr["result"]);
        }
        return $result;
    }
    
    function setResult(ProductInterestTriggerResult $result)
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
