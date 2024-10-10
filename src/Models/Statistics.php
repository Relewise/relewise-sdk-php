<?php declare(strict_types=1);

namespace Relewise\Models;

class Statistics
{
    public float $serverTimeInMs;
    public static function create() : Statistics
    {
        $result = new Statistics();
        return $result;
    }
    
    public static function hydrate(array $arr) : Statistics
    {
        $result = new Statistics();
        if (array_key_exists("serverTimeInMs", $arr))
        {
            $result->serverTimeInMs = $arr["serverTimeInMs"];
        }
        return $result;
    }
    
    function setServerTimeInMs(float $serverTimeInMs)
    {
        $this->serverTimeInMs = $serverTimeInMs;
        return $this;
    }
}
