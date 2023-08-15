<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class Money
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Money, Relewise.Client";
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
    /**
     * Sets amount to a new value.
     * @param float $amount new value.
     */
    function setAmount(float $amount)
    {
        $this->amount = $amount;
        return $this;
    }
    /**
     * Sets currency to a new value.
     * @param Currency $currency new value.
     */
    function setCurrency(Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
}
