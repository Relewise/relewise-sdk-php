<?php declare(strict_types=1);

namespace Relewise\Models;

class RetailMediaSearchTermConditionCollection
{
    public ?array $values;
    
    public static function create(RetailMediaSearchTermCondition ... $languageSpecificSearchTermConditions) : RetailMediaSearchTermConditionCollection
    {
        $result = new RetailMediaSearchTermConditionCollection();
        $result->values = $languageSpecificSearchTermConditions;
        return $result;
    }
    
    public static function hydrate(array $arr) : RetailMediaSearchTermConditionCollection
    {
        $result = new RetailMediaSearchTermConditionCollection();
        if (array_key_exists("values", $arr))
        {
            $result->values = array();
            foreach($arr["values"] as &$value)
            {
                array_push($result->values, RetailMediaSearchTermCondition::hydrate($value));
            }
        }
        return $result;
    }
    
    function setValues(RetailMediaSearchTermCondition ... $values)
    {
        $this->values = $values;
        return $this;
    }
    
    /** @param ?RetailMediaSearchTermCondition[] $values new value. */
    function setValuesFromArray(array $values)
    {
        $this->values = $values;
        return $this;
    }
    
    function addToValues(RetailMediaSearchTermCondition $values)
    {
        if (!isset($this->values))
        {
            $this->values = array();
        }
        array_push($this->values, $values);
        return $this;
    }
}
