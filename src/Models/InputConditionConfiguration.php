<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class InputConditionConfiguration
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Merchandising.Configurations.InputConditionConfiguration, Relewise.Client";
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
    /**
     * Sets filters to a new value.
     * @param FilterCollection $filters new value.
     */
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    /**
     * Sets evaluationMode to a new value.
     * @param EvaluationMode $evaluationMode new value.
     */
    function setEvaluationMode(EvaluationMode $evaluationMode)
    {
        $this->evaluationMode = $evaluationMode;
        return $this;
    }
}
