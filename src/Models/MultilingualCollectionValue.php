<?php declare(strict_types=1);

namespace Relewise\Models;

class MultilingualCollectionValue
{
    public Language $language;
    public array $values;
    
    public static function create(Language $language, string ... $values) : MultilingualCollectionValue
    {
        $result = new MultilingualCollectionValue();
        $result->language = $language;
        $result->values = $values;
        return $result;
    }
    
    public static function hydrate(array $arr) : MultilingualCollectionValue
    {
        $result = new MultilingualCollectionValue();
        if (array_key_exists("language", $arr))
        {
            $result->language = Language::hydrate($arr["language"]);
        }
        if (array_key_exists("values", $arr))
        {
            $result->values = array();
            foreach($arr["values"] as &$value)
            {
                array_push($result->values, $value);
            }
        }
        return $result;
    }
    
    function setLanguage(Language $language)
    {
        $this->language = $language;
        return $this;
    }
    
    function setValues(string ... $values)
    {
        $this->values = $values;
        return $this;
    }
    
    /** @param string[] $values new value. */
    function setValuesFromArray(array $values)
    {
        $this->values = $values;
        return $this;
    }
    
    function addToValues(string $values)
    {
        if (!isset($this->values))
        {
            $this->values = array();
        }
        array_push($this->values, $values);
        return $this;
    }
}
