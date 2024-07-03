<?php declare(strict_types=1);

namespace Relewise\Models;

class floatRange
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Range`1[[System.Nullable`1[[System.Decimal, System.Private.CoreLib, Version=8.0.0.0, Culture=neutral, PublicKeyToken=7cec85d7bea7798e]], System.Private.CoreLib, Version=8.0.0.0, Culture=neutral, PublicKeyToken=7cec85d7bea7798e]], Relewise.Client";
    public ?float $lowerBoundInclusive;
    public ?float $upperBoundInclusive;
    public static function create(?float $lowerBoundInclusive, ?float $upperBoundInclusive) : floatRange
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
    function setLowerBoundInclusive(?float $lowerBoundInclusive)
    {
        $this->lowerBoundInclusive = $lowerBoundInclusive;
        return $this;
    }
    function setUpperBoundInclusive(?float $upperBoundInclusive)
    {
        $this->upperBoundInclusive = $upperBoundInclusive;
        return $this;
    }
}
