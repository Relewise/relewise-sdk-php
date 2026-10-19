<?php declare(strict_types=1);

namespace Relewise\Models;

/** Matches when the request contains every configured key and each key has one of its accepted values. For example, DeviceType can accept either Mobile or Tablet. Comparisons are exact and case-sensitive. */
class ContextValuesMatchCondition extends ContextValueCondition
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Merchandising.ContextValuesMatchCondition, Relewise.Client";
    /** The values that each request key may have. A null or empty dictionary adds no restriction. Each configured key must have a non-empty list with no null values. An empty string is a valid value. */
    public ?array $acceptedValues;
    
    public static function create() : ContextValuesMatchCondition
    {
        $result = new ContextValuesMatchCondition();
        return $result;
    }
    
    public static function hydrate(array $arr) : ContextValuesMatchCondition
    {
        $result = ContextValueCondition::hydrateBase(new ContextValuesMatchCondition(), $arr);
        if (array_key_exists("acceptedValues", $arr))
        {
            $result->acceptedValues = array();
            foreach($arr["acceptedValues"] as $key => $value)
            {
                $result->acceptedValues[$key] = $value;
            }
        }
        return $result;
    }
    
    /** The values that each request key may have. A null or empty dictionary adds no restriction. Each configured key must have a non-empty list with no null values. An empty string is a valid value. */
    function addToAcceptedValues(string $key, array $value)
    {
        if (!isset($this->acceptedValues))
        {
            $this->acceptedValues = array();
        }
        $this->acceptedValues[$key] = $value;
        return $this;
    }
    
    /**
     * The values that each request key may have. A null or empty dictionary adds no restriction. Each configured key must have a non-empty list with no null values. An empty string is a valid value.
     * @param ?array<string, array> $acceptedValues associative array.
     */
    function setAcceptedValuesFromAssociativeArray(array $acceptedValues)
    {
        $this->acceptedValues = $acceptedValues;
        return $this;
    }
}
