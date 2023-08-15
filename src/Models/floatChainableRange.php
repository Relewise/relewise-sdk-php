<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class floatChainableRange
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ChainableRange`1[[System.Nullable`1[[System.Double, System.Private.CoreLib, Version=7.0.0.0, Culture=neutral, PublicKeyToken=7cec85d7bea7798e]], System.Private.CoreLib, Version=7.0.0.0, Culture=neutral, PublicKeyToken=7cec85d7bea7798e]], Relewise.Client";
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
    /**
     * Sets lowerBoundInclusive to a new value.
     * @param ?float $lowerBoundInclusive new value.
     */
    function setLowerBoundInclusive(?float $lowerBoundInclusive)
    {
        $this->lowerBoundInclusive = $lowerBoundInclusive;
        return $this;
    }
    /**
     * Sets upperBoundExclusive to a new value.
     * @param ?float $upperBoundExclusive new value.
     */
    function setUpperBoundExclusive(?float $upperBoundExclusive)
    {
        $this->upperBoundExclusive = $upperBoundExclusive;
        return $this;
    }
}
