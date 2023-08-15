<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class Language
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Language, Relewise.Client";
    public string $value;
    const UNDEFINED = Null;
    public static function create(string $name) : Language
    {
        $result = new Language();
        $result->value = $name;
        return $result;
    }
    public static function hydrate(array $arr) : Language
    {
        $result = new Language();
        if (array_key_exists("value", $arr))
        {
            $result->value = $arr["value"];
        }
        return $result;
    }
    /**
     * Sets value to a new value.
     * @param string $value new value.
     */
    function setValue(string $value)
    {
        $this->value = $value;
        return $this;
    }
}
