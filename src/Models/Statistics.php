<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class Statistics
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Statistics, Relewise.Client";
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
    /**
     * Sets serverTimeInMs to a new value.
     * @param float $serverTimeInMs new value.
     */
    function setServerTimeInMs(float $serverTimeInMs)
    {
        $this->serverTimeInMs = $serverTimeInMs;
        return $this;
    }
}
