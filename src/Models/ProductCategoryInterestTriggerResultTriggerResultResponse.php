<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductCategoryInterestTriggerResultTriggerResultResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.TriggerResultResponse`1[[Relewise.Client.Responses.Triggers.Results.ProductCategoryInterestTriggerResult, Relewise.Client, Version=1.280.0.0, Culture=neutral, PublicKeyToken=null]], Relewise.Client";
    public ProductCategoryInterestTriggerResult $result;
    
    public static function create() : ProductCategoryInterestTriggerResultTriggerResultResponse
    {
        $result = new ProductCategoryInterestTriggerResultTriggerResultResponse();
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductCategoryInterestTriggerResultTriggerResultResponse
    {
        $result = TimedResponse::hydrateBase(new ProductCategoryInterestTriggerResultTriggerResultResponse(), $arr);
        if (array_key_exists("result", $arr))
        {
            $result->result = ProductCategoryInterestTriggerResult::hydrate($arr["result"]);
        }
        return $result;
    }
    
    function setResult(ProductCategoryInterestTriggerResult $result)
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
