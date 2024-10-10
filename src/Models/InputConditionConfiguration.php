<?php declare(strict_types=1);

namespace Relewise\Models;

class InputConditionConfiguration
{
    public FilterCollection $filters;
    public EvaluationMode $evaluationMode;
    public static function create() : InputConditionConfiguration
    {
        $result = new InputConditionConfiguration();
        return $result;
    }
    
    public static function hydrate(array $arr) : InputConditionConfiguration
    {
        $result = new InputConditionConfiguration();
        if (array_key_exists("filters", $arr))
        {
            $result->filters = FilterCollection::hydrate($arr["filters"]);
        }
        if (array_key_exists("evaluationMode", $arr))
        {
            $result->evaluationMode = EvaluationMode::from($arr["evaluationMode"]);
        }
        return $result;
    }
    
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    
    function setEvaluationMode(EvaluationMode $evaluationMode)
    {
        $this->evaluationMode = $evaluationMode;
        return $this;
    }
}
