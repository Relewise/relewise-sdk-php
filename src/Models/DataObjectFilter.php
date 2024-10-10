<?php declare(strict_types=1);

namespace Relewise\Models;

class DataObjectFilter
{
    public ?array $conditions;
    public ?int $skip;
    public ?int $take;
    public static function create(ObjectValueCondition ... $conditions) : DataObjectFilter
    {
        $result = new DataObjectFilter();
        $result->conditions = $conditions;
        return $result;
    }
    public static function hydrate(array $arr) : DataObjectFilter
    {
        $result = new DataObjectFilter();
        if (array_key_exists("conditions", $arr))
        {
            $result->conditions = array();
            foreach($arr["conditions"] as &$value)
            {
                array_push($result->conditions, ObjectValueCondition::hydrate($value));
            }
        }
        if (array_key_exists("skip", $arr))
        {
            $result->skip = $arr["skip"];
        }
        if (array_key_exists("take", $arr))
        {
            $result->take = $arr["take"];
        }
        return $result;
    }
    
    function setConditions(ObjectValueCondition ... $conditions)
    {
        $this->conditions = $conditions;
        return $this;
    }
    
    /** @param ?ObjectValueCondition[] $conditions new value. */
    function setConditionsFromArray(array $conditions)
    {
        $this->conditions = $conditions;
        return $this;
    }
    
    function addToConditions(ObjectValueCondition $conditions)
    {
        if (!isset($this->conditions))
        {
            $this->conditions = array();
        }
        array_push($this->conditions, $conditions);
        return $this;
    }
    
    function setSkip(?int $skip)
    {
        $this->skip = $skip;
        return $this;
    }
    
    function setTake(?int $take)
    {
        $this->take = $take;
        return $this;
    }
}
