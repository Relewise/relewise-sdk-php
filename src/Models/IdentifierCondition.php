<?php declare(strict_types=1);

namespace Relewise\Models;

class IdentifierCondition extends UserCondition
{
    public string $typeDefinition = "Relewise.Client.DataTypes.UserConditions.IdentifierCondition, Relewise.Client";
    public string $key;
    public array $values;
    
    public static function create(string $key, array $values, bool $negated = false) : IdentifierCondition
    {
        $result = new IdentifierCondition();
        $result->key = $key;
        $result->values = $values;
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : IdentifierCondition
    {
        $result = UserCondition::hydrateBase(new IdentifierCondition(), $arr);
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        if (array_key_exists("values", $arr))
        {
            $result->values = array();
            foreach($arr["values"] as &$value)
            {
                array_push($result->values, $value);
            }
        }
        return $result;
    }
    
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    
    function setValues(string ... $values)
    {
        $this->values = $values;
        return $this;
    }
    
    /** @param string[] $values new value. */
    function setValuesFromArray(array $values)
    {
        $this->values = $values;
        return $this;
    }
    
    function addToValues(string $values)
    {
        if (!isset($this->values))
        {
            $this->values = array();
        }
        array_push($this->values, $values);
        return $this;
    }
    
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
