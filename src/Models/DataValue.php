<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class DataValue
{
    public string $typeDefinition = "Relewise.Client.DataTypes.DataValue, Relewise.Client";
    public DataValueDataValueTypes $type;
    public mixed $value;
    public static function create() : DataValue
    {
        $result = new DataValue();
        return $result;
    }
    public static function hydrate(array $arr) : DataValue
    {
        $result = new DataValue();
        if (array_key_exists("type", $arr))
        {
            $result->type = DataValueDataValueTypes::from($arr["type"]);
        }
        if (array_key_exists("value", $arr))
        {
            $result->value = $arr["value"];
        }
        return $result;
    }
    /**
     * Sets type to a new value.
     * @param DataValueDataValueTypes $type new value.
     */
    function setType(DataValueDataValueTypes $type)
    {
        $this->type = $type;
        return $this;
    }
    /**
     * Sets value to a new value.
     * @param mixed $value new value.
     */
    function setValue(mixed $value)
    {
        $this->value = $value;
        return $this;
    }
}
