<?php declare(strict_types=1);

namespace Relewise\Models;

/** Provides search result highlights as matched text in data. */
class HighlightResultSnippet
{
    public array $displayName;
    public array $data;
    
    public static function create(array $displayName, stringarrayKeyValuePair ... $data) : HighlightResultSnippet
    {
        $result = new HighlightResultSnippet();
        $result->displayName = $displayName;
        $result->data = $data;
        return $result;
    }
    
    public static function hydrate(array $arr) : HighlightResultSnippet
    {
        $result = new HighlightResultSnippet();
        if (array_key_exists("displayName", $arr))
        {
            $result->displayName = array();
            foreach($arr["displayName"] as &$value)
            {
                array_push($result->displayName, $value);
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
    
    function setDisplayName(string ... $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    
    /** @param string[] $displayName new value. */
    function setDisplayNameFromArray(array $displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }
    
    function addToDisplayName(string $displayName)
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
