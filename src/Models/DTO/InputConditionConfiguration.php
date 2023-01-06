<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

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
    function withFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    function withEvaluationMode(EvaluationMode $evaluationMode)
    {
        $this->evaluationMode = $evaluationMode;
        return $this;
    }
}
