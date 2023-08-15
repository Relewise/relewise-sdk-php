<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class TriggersResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.TriggersResponse, Relewise.Client";
    public int $remainingResults;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = TimedResponse::hydrateBase($result, $arr);
        if (array_key_exists("remainingResults", $arr))
        {
            $result->remainingResults = $arr["remainingResults"];
        }
        return $result;
    }
    /**
     * Sets remainingResults to a new value.
     * @param int $remainingResults new value.
     */
    function setRemainingResults(int $remainingResults)
    {
        $this->remainingResults = $remainingResults;
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
