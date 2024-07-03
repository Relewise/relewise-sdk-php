<?php declare(strict_types=1);

namespace Relewise\Models;

class TriggerResultResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.TriggerResultResponse, Relewise.Client";
    public ITriggerResult $result;
    public static function create() : TriggerResultResponse
    {
        $result = new TriggerResultResponse();
        return $result;
    }
    public static function hydrate(array $arr) : TriggerResultResponse
    {
        $result = TimedResponse::hydrateBase(new TriggerResultResponse(), $arr);
        if (array_key_exists("result", $arr))
        {
            $result->result = ITriggerResult::hydrate($arr["result"]);
        }
        return $result;
    }
    function setResult(ITriggerResult $result)
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
