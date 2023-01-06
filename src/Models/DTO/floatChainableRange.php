<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class floatChainableRange
{
    public ?float $lowerBoundInclusive;
    public ?float $upperBoundExclusive;
    public static function create(?float $lowerBoundInclusive, ?float $upperBoundExclusive) : floatChainableRange
    {
        $result = new floatChainableRange();
        $result->lowerBoundInclusive = $lowerBoundInclusive;
        $result->upperBoundExclusive = $upperBoundExclusive;
        return $result;
    }
    public static function hydrate(array $arr) : floatChainableRange
    {
        $result = new floatChainableRange();
        if (array_key_exists("lowerBoundInclusive", $arr))
        {
            $result->lowerBoundInclusive = $arr["lowerBoundInclusive"];
        }
        if (array_key_exists("upperBoundExclusive", $arr))
        {
            $result->upperBoundExclusive = $arr["upperBoundExclusive"];
        }
        return $result;
    }
    function withLowerBoundInclusive(?float $lowerBoundInclusive)
    {
        $this->lowerBoundInclusive = $lowerBoundInclusive;
        return $this;
    }
    function withUpperBoundExclusive(?float $upperBoundExclusive)
    {
        $this->upperBoundExclusive = $upperBoundExclusive;
        return $this;
    }
}
