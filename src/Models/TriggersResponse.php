<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class TriggersResponse extends TimedResponse
{
    public string $typeDefinition = "";
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
    
    function setRemainingResults(int $remainingResults)
    {
        $this->remainingResults = $remainingResults;
        return $this;
    }
    
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
