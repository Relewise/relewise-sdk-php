<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

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
    function withResult(ITriggerResult $result)
    {
        $this->result = $result;
        return $this;
    }
    function withStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
