<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class PredictionRulePromotion
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Configuration.SearchRules.PredictionRule+Promotion, Relewise.Client";
    public PromotionPosition $to;
    public array $values;
    public static function create(PromotionPosition $toPosition, string ... $values) : PredictionRulePromotion
    {
        $result = new PredictionRulePromotion();
        $result->to = $toPosition;
        $result->values = $values;
        return $result;
    }
    public static function hydrate(array $arr) : PredictionRulePromotion
    {
        $result = new PredictionRulePromotion();
        if (array_key_exists("to", $arr))
        {
            $result->to = PromotionPosition::from($arr["to"]);
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
    function setTo(PromotionPosition $to)
    {
        $this->to = $to;
        return $this;
    }
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
