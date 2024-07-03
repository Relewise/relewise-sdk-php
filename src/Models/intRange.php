<?php declare(strict_types=1);

namespace Relewise\Models;

class intRange
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Range`1[[System.Nullable`1[[System.Int32, System.Private.CoreLib, Version=8.0.0.0, Culture=neutral, PublicKeyToken=7cec85d7bea7798e]], System.Private.CoreLib, Version=8.0.0.0, Culture=neutral, PublicKeyToken=7cec85d7bea7798e]], Relewise.Client";
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
    function setLowerBoundInclusive(?int $lowerBoundInclusive)
    {
        $this->lowerBoundInclusive = $lowerBoundInclusive;
        return $this;
    }
    function setUpperBoundInclusive(?int $upperBoundInclusive)
    {
        $this->upperBoundInclusive = $upperBoundInclusive;
        return $this;
    }
}
