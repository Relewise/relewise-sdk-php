<?php declare(strict_types=1);

namespace Relewise\Models;

class PredictionRuleSuppression
{
    public PredictionRuleSuppressionConditionKind $condition;
    public array $values;
    public static function create(PredictionRuleSuppressionConditionKind $condition, string ... $values) : PredictionRuleSuppression
    {
        $result = new PredictionRuleSuppression();
        $result->condition = $condition;
        $result->values = $values;
        return $result;
    }
    public static function hydrate(array $arr) : PredictionRuleSuppression
    {
        $result = new PredictionRuleSuppression();
        if (array_key_exists("condition", $arr))
        {
            $result->condition = PredictionRuleSuppressionConditionKind::from($arr["condition"]);
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
    function setCondition(PredictionRuleSuppressionConditionKind $condition)
    {
        $this->condition = $condition;
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
}
