<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

class ScheduledPeriod implements JsonSerializable
{
    public ?DateTime $fromUtc;
    
    public ?DateTime $toUtc;
    
    public static function create(?DateTime $fromUtc, ?DateTime $toUtc) : ScheduledPeriod
    {
        $result = new ScheduledPeriod();
        $result->fromUtc = $fromUtc;
        $result->toUtc = $toUtc;
        return $result;
    }
    
    public static function hydrate(array $arr) : ScheduledPeriod
    {
        $result = new ScheduledPeriod();
        if (array_key_exists("fromUtc", $arr))
        {
            $result->fromUtc = new DateTime($arr["fromUtc"]);
        }
        if (array_key_exists("toUtc", $arr))
        {
            $result->toUtc = new DateTime($arr["toUtc"]);
        }
        return $result;
    }
    
    function setFromUtc(?DateTime $fromUtc)
    {
        $this->fromUtc = $fromUtc;
        return $this;
    }
    
    function setToUtc(?DateTime $toUtc)
    {
        $this->toUtc = $toUtc;
        return $this;
    }
    
    public function jsonSerialize(): mixed
    {
        $result = array();
        if (isset($this->fromUtc))
        {
            $result["fromUtc"] = $this->fromUtc->format(DATE_ATOM);
        }
        if (isset($this->toUtc))
        {
            $result["toUtc"] = $this->toUtc->format(DATE_ATOM);
        }
        return $result;
    }
}
