<?php declare(strict_types=1);

namespace Relewise\Models;

class DistinctCondition extends ValueCondition
{
    public string $typeDefinition = "Relewise.Client.Requests.Conditions.DistinctCondition, Relewise.Client";
    public int $numberOfOccurrencesAllowedWithTheSameValue;
    public static function create(int $numberOfOccurrencesAllowedWithTheSameValue = 1) : DistinctCondition
    {
        $result = new DistinctCondition();
        $result->numberOfOccurrencesAllowedWithTheSameValue = $numberOfOccurrencesAllowedWithTheSameValue;
        return $result;
    }
    public static function hydrate(array $arr) : DistinctCondition
    {
        $result = ValueCondition::hydrateBase(new DistinctCondition(), $arr);
        if (array_key_exists("numberOfOccurrencesAllowedWithTheSameValue", $arr))
        {
            $result->numberOfOccurrencesAllowedWithTheSameValue = $arr["numberOfOccurrencesAllowedWithTheSameValue"];
        }
        return $result;
    }
    
    function setNumberOfOccurrencesAllowedWithTheSameValue(int $numberOfOccurrencesAllowedWithTheSameValue)
    {
        $this->numberOfOccurrencesAllowedWithTheSameValue = $numberOfOccurrencesAllowedWithTheSameValue;
        return $this;
    }
    
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
