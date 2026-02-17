<?php declare(strict_types=1);

namespace Relewise\Models;

class MultilingualCollection
{
    public array $values;
    
    public static function create(MultilingualCollectionValue ... $collections) : MultilingualCollection
    {
        $result = new MultilingualCollection();
        $result->values = $collections;
        return $result;
    }
    
    public static function hydrate(array $arr) : MultilingualCollection
    {
        $result = new MultilingualCollection();
        if (array_key_exists("values", $arr))
        {
            $result->values = array();
            foreach($arr["values"] as &$value)
            {
                array_push($result->values, MultilingualCollectionValue::hydrate($value));
            }
        }
        return $result;
    }
    
    function setValues(MultilingualCollectionValue ... $values)
    {
        $this->values = $values;
        return $this;
    }
    
    /** @param MultilingualCollectionValue[] $values new value. */
    function setValuesFromArray(array $values)
    {
        $this->values = $values;
        return $this;
    }
    
    function addToValues(MultilingualCollectionValue $values)
    {
        if (!isset($this->values))
        {
            $this->values = array();
        }
        array_push($this->values, $values);
        return $this;
    }
}
