<?php declare(strict_types=1);

namespace Relewise\Models;

class PromotionCollection
{
    public array $promotions;
    public static function create(Promotion ... $promotions) : PromotionCollection
    {
        $result = new PromotionCollection();
        $result->promotions = $promotions;
        return $result;
    }
    
    public static function hydrate(array $arr) : PromotionCollection
    {
        $result = new PromotionCollection();
        if (array_key_exists("promotions", $arr))
        {
            $result->promotions = array();
            foreach($arr["promotions"] as &$value)
            {
                array_push($result->promotions, Promotion::hydrate($value));
            }
        }
        return $result;
    }
    
    function setPromotions(Promotion ... $promotions)
    {
        $this->promotions = $promotions;
        return $this;
    }
    
    /** @param Promotion[] $promotions new value. */
    function setPromotionsFromArray(array $promotions)
    {
        $this->promotions = $promotions;
        return $this;
    }
    
    function addToPromotions(Promotion $promotions)
    {
        if (!isset($this->promotions))
        {
            $this->promotions = array();
        }
        array_push($this->promotions, $promotions);
        return $this;
    }
}
