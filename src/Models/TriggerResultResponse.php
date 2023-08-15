<?php declare(strict_types=1);

namespace Relewise\Models;

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
    /**
     * Sets result to a new value.
     * @param ITriggerResult $result new value.
     */
    function setResult(ITriggerResult $result)
    {
        $this->result = $result;
        return $this;
    }
    /**
     * Sets statistics to a new value.
     * @param Statistics $statistics new value.
     */
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
