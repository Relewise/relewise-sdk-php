<?php declare(strict_types=1);

namespace Relewise\Models;

class Money
{
    public float $amount;
    public Currency $currency;
    public static function create(Currency $currency, float $amount) : Money
    {
        $result = new Money();
        $result->currency = $currency;
        $result->amount = $amount;
        return $result;
    }
    public static function hydrate(array $arr) : Money
    {
        $result = new Money();
        if (array_key_exists("amount", $arr))
        {
            $result->amount = $arr["amount"];
        }
        if (array_key_exists("currency", $arr))
        {
            $result->currency = Currency::hydrate($arr["currency"]);
        }
        return $result;
    }
    
    function setAmount(float $amount)
    {
        $this->amount = $amount;
        return $this;
    }
    
    function setCurrency(Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
}
