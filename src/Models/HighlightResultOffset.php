<?php declare(strict_types=1);

namespace Relewise\Models;

/** Provides search result highlights as match indices in data. */
class HighlightResultOffset
{
    public array $displayName;
    public array $data;
    
    public static function create(array $displayName, stringarrayKeyValuePair ... $data) : HighlightResultOffset
    {
        $result = new HighlightResultOffset();
        $result->displayName = $displayName;
        $result->data = $data;
        return $result;
    }
    
    public static function hydrate(array $arr) : HighlightResultOffset
    {
        $result = new HighlightResultOffset();
        if (array_key_exists("displayName", $arr))
        {
            $result->displayName = array();
            foreach($arr["displayName"] as &$value)
            {
                array_push($result->displayName, intRange::hydrate($value));
            }
        }
        if (array_key_exists("data", $arr))
        {
            $result->data = array();
            foreach($arr["data"] as &$value)
            {
                array_push($result->data, $value);
            }
        }
        return $result;
    }
    
    function setDisplayName(intRange ... $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    
    /** @param intRange[] $displayName new value. */
    function setDisplayNameFromArray(array $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    
    function addToDisplayName(intRange $displayName)
    {
        if (!isset($this->displayName))
        {
            $this->displayName = array();
        }
        array_push($this->displayName, $displayName);
        return $this;
    }
    
    function setData(stringarrayKeyValuePair ... $data)
    {
        $this->data = $data;
        return $this;
    }
    
    /** @param stringarrayKeyValuePair[] $data new value. */
    function setDataFromArray(array $data)
    {
        $this->data = $data;
        return $this;
    }
    
    function addToData(stringarrayKeyValuePair $data)
    {
        if (!isset($this->data))
        {
            $this->data = array();
        }
        array_push($this->data, $data);
        return $this;
    }
}
