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
    function setConditions(ObjectValueCondition ... $conditions)
    {
        $this->conditions = $conditions;
        return $this;
    }
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
