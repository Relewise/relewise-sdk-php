<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class DataObjectFilter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.DataObjects.DataObjectFilter, Relewise.Client";
    public ?array $conditions;
    public ?int $skip;
    public ?int $take;
    public static function create() : DataObjectFilter
    {
        $result = new DataObjectFilter();
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
    /**
     * Sets conditions to a new value.
     * @param ?ObjectValueCondition[] $conditions new value.
     */
    function setConditions(ObjectValueCondition ... $conditions)
    {
        $this->conditions = $conditions;
        return $this;
    }
    /**
     * Sets conditions to a new value from an array.
     * @param ?ObjectValueCondition[] $conditions new value.
     */
    function setConditionsFromArray(array $conditions)
    {
        $this->conditions = $conditions;
        return $this;
    }
    /**
     * Adds a new element to conditions.
     * @param ObjectValueCondition $conditions new element.
     */
    function addToConditions(ObjectValueCondition $conditions)
    {
        if (!isset($this->conditions))
        {
            $this->conditions = array();
        }
        array_push($this->conditions, $conditions);
        return $this;
    }
    /**
     * Sets skip to a new value.
     * @param ?int $skip new value.
     */
    function setSkip(?int $skip)
    {
        $this->skip = $skip;
        return $this;
    }
    /**
     * Sets take to a new value.
     * @param ?int $take new value.
     */
    function setTake(?int $take)
    {
        $this->take = $take;
        return $this;
    }
}
