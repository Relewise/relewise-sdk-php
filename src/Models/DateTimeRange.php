<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;
use JsonSerializable;

class DateTimeRange implements JsonSerializable
{
    public DateTime $lowerBoundInclusive;
    
    public DateTime $upperBoundInclusive;
    
    public static function create(DateTime $lowerBoundInclusive, DateTime $upperBoundInclusive) : DateTimeRange
    {
        $result = new DateTimeRange();
        $result->lowerBoundInclusive = $lowerBoundInclusive;
        $result->upperBoundInclusive = $upperBoundInclusive;
        return $result;
    }
    
    public static function hydrate(array $arr) : DateTimeRange
    {
        $result = new DateTimeRange();
        if (array_key_exists("lowerBoundInclusive", $arr))
        {
            $result->lowerBoundInclusive = $arr["lowerBoundInclusive"];
        }
        if (array_key_exists("upperBoundInclusive", $arr))
        {
            $result->upperBoundInclusive = $arr["upperBoundInclusive"];
        }
        return $result;
    }
    
    function setLowerBoundInclusive(DateTime $lowerBoundInclusive)
    {
        $this->lowerBoundInclusive = $lowerBoundInclusive;
        return $this;
    }
    
    function setUpperBoundInclusive(DateTime $upperBoundInclusive)
    {
        $this->upperBoundInclusive = $upperBoundInclusive;
        return $this;
    }
    
    public function jsonSerialize(): mixed
    {
        $result = array();
        if (isset($this->lowerBoundInclusive))
        {
            $result["lowerBoundInclusive"] = $this->lowerBoundInclusive->format(DATE_ATOM);
        }
        if (isset($this->upperBoundInclusive))
        {
            $result["upperBoundInclusive"] = $this->upperBoundInclusive->format(DATE_ATOM);
        }
        return $result;
    }
}
