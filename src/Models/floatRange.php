<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class floatRange
{
    public float $lowerBoundInclusive;
    public float $upperBoundInclusive;
    public static function create(float $lowerBoundInclusive, float $upperBoundInclusive) : floatRange
    {
        $result = new floatRange();
        $result->lowerBoundInclusive = $lowerBoundInclusive;
        $result->upperBoundInclusive = $upperBoundInclusive;
        return $result;
    }
    public static function hydrate(array $arr) : floatRange
    {
        $result = new floatRange();
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
    function setLowerBoundInclusive(float $lowerBoundInclusive)
    {
        $this->lowerBoundInclusive = $lowerBoundInclusive;
        return $this;
    }
    function setUpperBoundInclusive(float $upperBoundInclusive)
    {
        $this->upperBoundInclusive = $upperBoundInclusive;
        return $this;
    }
}
