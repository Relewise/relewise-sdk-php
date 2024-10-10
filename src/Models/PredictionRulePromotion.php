<?php declare(strict_types=1);

namespace Relewise\Models;

class PredictionRulePromotion
{
    public PredictionRulePromotionPosition $to;
    public array $values;
    public static function create(PredictionRulePromotionPosition $toPosition, string ... $values) : PredictionRulePromotion
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
            $result->to = PredictionRulePromotionPosition::from($arr["to"]);
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
    
    function setTo(PredictionRulePromotionPosition $to)
    {
        $this->to = $to;
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
