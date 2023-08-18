<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class TrimStringTransformer
{
    public string $typeDefinition = "Relewise.Client.Requests.Transformers.TrimStringTransformer, Relewise.Client";
    public array $valuesToTrim;
    public static function create(string ... $valuesToTrim) : TrimStringTransformer
    {
        $result = new TrimStringTransformer();
        $result->valuesToTrim = $valuesToTrim;
        return $result;
    }
    public static function hydrate(array $arr) : TrimStringTransformer
    {
        $result = new TrimStringTransformer();
        if (array_key_exists("valuesToTrim", $arr))
        {
            $result->valuesToTrim = array();
            foreach($arr["valuesToTrim"] as &$value)
            {
                array_push($result->valuesToTrim, $value);
            }
        }
        return $result;
    }
    function setValuesToTrim(string ... $valuesToTrim)
    {
        $this->valuesToTrim = $valuesToTrim;
        return $this;
    }
    /**
     * Sets valuesToTrim to a new value from an array.
     * @param string[] $valuesToTrim new value.
     */
    function setValuesToTrimFromArray(array $valuesToTrim)
    {
        $this->valuesToTrim = $valuesToTrim;
        return $this;
    }
    function addToValuesToTrim(string $valuesToTrim)
    {
        if (!isset($this->valuesToTrim))
        {
            $this->valuesToTrim = array();
        }
        array_push($this->valuesToTrim, $valuesToTrim);
        return $this;
    }
}
