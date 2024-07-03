<?php declare(strict_types=1);

namespace Relewise\Models;

class Currency
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Currency, Relewise.Client";
    public string $value;
    const UNDEFINED = Null;
    public static function create(string $name) : Currency
    {
        $result = new Currency();
        $result->value = $name;
        return $result;
    }
    public static function hydrate(array $arr) : Currency
    {
        $result = new Currency();
        if (array_key_exists("value", $arr))
        {
            $result->value = $arr["value"];
        }
        return $result;
    }
    function setValue(string $value)
    {
        $this->value = $value;
        return $this;
    }
}
