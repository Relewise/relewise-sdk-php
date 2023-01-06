<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class PredictionRuleSuppression
{
    public SuppressionConditionKind $condition;
    public array $values;
    public static function create(SuppressionConditionKind $condition, string ... $values) : PredictionRuleSuppression
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
            $result->condition = SuppressionConditionKind::from($arr["condition"]);
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
    function withCondition(SuppressionConditionKind $condition)
    {
        $this->condition = $condition;
        return $this;
    }
    function withValues(string ... $values)
    {
        $this->values = $values;
        return $this;
    }
}
