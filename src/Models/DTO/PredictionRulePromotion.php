<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class PredictionRulePromotion
{
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
    function withTo(PromotionPosition $to)
    {
        $this->to = $to;
        return $this;
    }
    function withValues(string ... $values)
    {
        $this->values = $values;
        return $this;
    }
}
