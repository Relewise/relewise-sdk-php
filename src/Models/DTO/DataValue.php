<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class DataValue
{
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
    function withType(DataValueDataValueTypes $type)
    {
        $this->type = $type;
        return $this;
    }
    function withValue(mixed $value)
    {
        $this->value = $value;
        return $this;
    }
}
