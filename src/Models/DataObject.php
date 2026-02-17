<?php declare(strict_types=1);

namespace Relewise\Models;

class DataObject
{
    public array $data;
    
    public static function create(array $data) : DataObject
    {
        $result = new DataObject();
        $result->data = $data;
        return $result;
    }
    
    public static function hydrate(array $arr) : DataObject
    {
        $result = new DataObject();
        if (array_key_exists("data", $arr))
        {
            $result->data = array();
            foreach($arr["data"] as $key => $value)
            {
                $result->data[$key] = DataValue::hydrate($value);
            }
        }
        return $result;
    }
    
    function addToData(string $key, DataValue $value)
    {
        if (!isset($this->data))
        {
            $this->data = array();
        }
        $this->data[$key] = $value;
        return $this;
    }
    
    /** @param array<string, DataValue> $data associative array. */
    function setDataFromAssociativeArray(array $data)
    {
        $this->data = $data;
        return $this;
    }
}
