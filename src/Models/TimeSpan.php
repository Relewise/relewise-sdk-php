<?php declare(strict_types=1);

namespace Relewise\Models;

class TimeSpan
{
    public string $typeDefinition = "System.TimeSpan, System.Private.CoreLib";
    public int $ticks;
    public int $days;
    public int $hours;
    public int $milliseconds;
    public int $microseconds;
    public int $nanoseconds;
    public int $minutes;
    public int $seconds;
    public float $totalDays;
    public float $totalHours;
    public float $totalMilliseconds;
    public float $totalMicroseconds;
    public float $totalNanoseconds;
    public float $totalMinutes;
    public float $totalSeconds;
    
    public static function create(int $ticks) : TimeSpan
    {
        $result = new TimeSpan();
        $result->ticks = $ticks;
        return $result;
    }
    
    public static function hydrate(array $arr) : TimeSpan
    {
        $result = new TimeSpan();
        if (array_key_exists("ticks", $arr))
        {
            $result->ticks = $arr["ticks"];
        }
        if (array_key_exists("days", $arr))
        {
            $result->days = $arr["days"];
        }
        if (array_key_exists("hours", $arr))
        {
            $result->hours = $arr["hours"];
        }
        if (array_key_exists("milliseconds", $arr))
        {
            $result->milliseconds = $arr["milliseconds"];
        }
        if (array_key_exists("microseconds", $arr))
        {
            $result->microseconds = $arr["microseconds"];
        }
        if (array_key_exists("nanoseconds", $arr))
        {
            $result->nanoseconds = $arr["nanoseconds"];
        }
        if (array_key_exists("minutes", $arr))
        {
            $result->minutes = $arr["minutes"];
        }
        if (array_key_exists("seconds", $arr))
        {
            $result->seconds = $arr["seconds"];
        }
        if (array_key_exists("totalDays", $arr))
        {
            $result->totalDays = $arr["totalDays"];
        }
        if (array_key_exists("totalHours", $arr))
        {
            $result->totalHours = $arr["totalHours"];
        }
        if (array_key_exists("totalMilliseconds", $arr))
        {
            $result->totalMilliseconds = $arr["totalMilliseconds"];
        }
        if (array_key_exists("totalMicroseconds", $arr))
        {
            $result->totalMicroseconds = $arr["totalMicroseconds"];
        }
        if (array_key_exists("totalNanoseconds", $arr))
        {
            $result->totalNanoseconds = $arr["totalNanoseconds"];
        }
        if (array_key_exists("totalMinutes", $arr))
        {
            $result->totalMinutes = $arr["totalMinutes"];
        }
        if (array_key_exists("totalSeconds", $arr))
        {
            $result->totalSeconds = $arr["totalSeconds"];
        }
        return $result;
    }
    
    function setTicks(int $ticks)
    {
        $this->ticks = $ticks;
        return $this;
    }
    
    function setDays(int $days)
    {
        $this->days = $days;
        return $this;
    }
    
    function setHours(int $hours)
    {
        $this->hours = $hours;
        return $this;
    }
    
    function setMilliseconds(int $milliseconds)
    {
        $this->milliseconds = $milliseconds;
        return $this;
    }
    
    function setMicroseconds(int $microseconds)
    {
        $this->microseconds = $microseconds;
        return $this;
    }
    
    function setNanoseconds(int $nanoseconds)
    {
        $this->nanoseconds = $nanoseconds;
        return $this;
    }
    
    function setMinutes(int $minutes)
    {
        $this->minutes = $minutes;
        return $this;
    }
    
    function setSeconds(int $seconds)
    {
        $this->seconds = $seconds;
        return $this;
    }
    
    function setTotalDays(float $totalDays)
    {
        $this->totalDays = $totalDays;
        return $this;
    }
    
    function setTotalHours(float $totalHours)
    {
        $this->totalHours = $totalHours;
        return $this;
    }
    
    function setTotalMilliseconds(float $totalMilliseconds)
    {
        $this->totalMilliseconds = $totalMilliseconds;
        return $this;
    }
    
    function setTotalMicroseconds(float $totalMicroseconds)
    {
        $this->totalMicroseconds = $totalMicroseconds;
        return $this;
    }
    
    function setTotalNanoseconds(float $totalNanoseconds)
    {
        $this->totalNanoseconds = $totalNanoseconds;
        return $this;
    }
    
    function setTotalMinutes(float $totalMinutes)
    {
        $this->totalMinutes = $totalMinutes;
        return $this;
    }
    
    function setTotalSeconds(float $totalSeconds)
    {
        $this->totalSeconds = $totalSeconds;
        return $this;
    }
}
