<?php declare(strict_types=1);

namespace Relewise\Models;

class ContentCategoryInterestTriggerResultTriggerResultResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.TriggerResultResponse`1[[Relewise.Client.Responses.Triggers.Results.ContentCategoryInterestTriggerResult, Relewise.Client, Version=1.280.0.0, Culture=neutral, PublicKeyToken=null]], Relewise.Client";
    public ContentCategoryInterestTriggerResult $result;
    
    public static function create() : ContentCategoryInterestTriggerResultTriggerResultResponse
    {
        $result = new ContentCategoryInterestTriggerResultTriggerResultResponse();
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentCategoryInterestTriggerResultTriggerResultResponse
    {
        $result = TimedResponse::hydrateBase(new ContentCategoryInterestTriggerResultTriggerResultResponse(), $arr);
        if (array_key_exists("result", $arr))
        {
            $result->result = ContentCategoryInterestTriggerResult::hydrate($arr["result"]);
        }
        return $result;
    }
    
    function setResult(ContentCategoryInterestTriggerResult $result)
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
