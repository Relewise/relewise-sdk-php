<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class PredictionRuleSuppression
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Configuration.SearchRules.PredictionRule+Suppression, Relewise.Client";
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
    /**
     * Sets condition to a new value.
     * @param SuppressionConditionKind $condition new value.
     */
    function setCondition(SuppressionConditionKind $condition)
    {
        $this->condition = $condition;
        return $this;
    }
    /**
     * Sets values to a new value.
     * @param string[] $values new value.
     */
    function setValues(string ... $values)
    {
        $this->values = $values;
        return $this;
    }
    /**
     * Sets values to a new value from an array.
     * @param string[] $values new value.
     */
    function setValuesFromArray(array $values)
    {
        $this->values = $values;
        return $this;
    }
    /**
     * Adds a new element to values.
     * @param string $values new element.
     */
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
