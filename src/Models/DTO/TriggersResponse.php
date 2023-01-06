<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

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
    function withRemainingResults(int $remainingResults)
    {
        $this->remainingResults = $remainingResults;
        return $this;
    }
    function withStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
