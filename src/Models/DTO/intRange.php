<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class intRange
{
    public ?int $lowerBoundInclusive;
    public ?int $upperBoundInclusive;
    public static function create(?int $lowerBoundInclusive, ?int $upperBoundInclusive) : intRange
    {
        $result = new intRange();
        $result->lowerBoundInclusive = $lowerBoundInclusive;
        $result->upperBoundInclusive = $upperBoundInclusive;
        return $result;
    }
    public static function hydrate(array $arr) : intRange
    {
        $result = new intRange();
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
    function withLowerBoundInclusive(?int $lowerBoundInclusive)
    {
        $this->lowerBoundInclusive = $lowerBoundInclusive;
        return $this;
    }
    function withUpperBoundInclusive(?int $upperBoundInclusive)
    {
        $this->upperBoundInclusive = $upperBoundInclusive;
        return $this;
    }
}
