<?php declare(strict_types=1);

namespace Relewise\Models;

class ContainsCondition extends ValueCondition
{
    public string $typeDefinition = "Relewise.Client.Requests.Conditions.ContainsCondition, Relewise.Client";
    
    public ?DataValue $value;
    
    public ContainsConditionCollectionArgumentEvaluationMode $valueCollectionEvaluationMode;
    
    public ?DataObjectFilter $objectFilter;
    
    public static function create(bool $negated = false) : ContainsCondition
    {
        $result = new ContainsCondition();
        $result->negated = $negated;
        return $result;
    }
    
    public static function hydrate(array $arr) : ContainsCondition
    {
        $result = ValueCondition::hydrateBase(new ContainsCondition(), $arr);
        if (array_key_exists("value", $arr))
        {
            $result->value = DataValue::hydrate($arr["value"]);
        }
        if (array_key_exists("valueCollectionEvaluationMode", $arr))
        {
            $result->valueCollectionEvaluationMode = ContainsConditionCollectionArgumentEvaluationMode::from($arr["valueCollectionEvaluationMode"]);
        }
        if (array_key_exists("objectFilter", $arr))
        {
            $result->objectFilter = DataObjectFilter::hydrate($arr["objectFilter"]);
        }
        return $result;
    }
    
    function setValue(?DataValue $value)
    {
        $this->value = $value;
        return $this;
    }
    
    function setValueCollectionEvaluationMode(ContainsConditionCollectionArgumentEvaluationMode $valueCollectionEvaluationMode)
    {
        $this->valueCollectionEvaluationMode = $valueCollectionEvaluationMode;
        return $this;
    }
    
    function setObjectFilter(?DataObjectFilter $objectFilter)
    {
        $this->objectFilter = $objectFilter;
        return $this;
    }
    
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
