<?php declare(strict_types=1);

namespace Relewise\Models;

class UserActivityTriggerResultTriggerResultResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.TriggerResultResponse`1[[Relewise.Client.Responses.Triggers.Results.UserActivityTriggerResult, Relewise.Client, Version=1.280.0.0, Culture=neutral, PublicKeyToken=null]], Relewise.Client";
    public UserActivityTriggerResult $result;
    
    public static function create() : UserActivityTriggerResultTriggerResultResponse
    {
        $result = new UserActivityTriggerResultTriggerResultResponse();
        return $result;
    }
    
    public static function hydrate(array $arr) : UserActivityTriggerResultTriggerResultResponse
    {
        $result = TimedResponse::hydrateBase(new UserActivityTriggerResultTriggerResultResponse(), $arr);
        if (array_key_exists("result", $arr))
        {
            $result->result = UserActivityTriggerResult::hydrate($arr["result"]);
        }
        return $result;
    }
    
    function setResult(UserActivityTriggerResult $result)
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
