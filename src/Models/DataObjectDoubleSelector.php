<?php declare(strict_types=1);

namespace Relewise\Models;

/** Selects a double value from a data object (or list of data objects) using an object path and optional filter. */
class DataObjectDoubleSelector extends ValueSelector
{
    public string $typeDefinition = "Relewise.Client.Requests.ValueSelectors.DataObjectDoubleSelector, Relewise.Client";
    /** The data key on the target entity (e.g., product or variant data key) that contains the object or object list. */
    public string $key;
    /** The path within the data object that points to the numeric value to select. */
    public array $objectPath;
    /** Optional filter applied when the data key contains an object list. */
    public ?DataObjectFilter $objectFilter;
    
    /**
     * Creates a selector for a data object value.
     * @param string $key The data key holding the object or object list.
     * @param string[] $objectPath The path to the double value inside the object/object-list.
     * @param ?DataObjectFilter $objectFilter Optional filter to choose which object to read from an object list.
     */
    public static function create(string $key, array $objectPath, ?DataObjectFilter $objectFilter) : DataObjectDoubleSelector
    {
        $result = new DataObjectDoubleSelector();
        $result->key = $key;
        $result->objectPath = $objectPath;
        $result->objectFilter = $objectFilter;
        return $result;
    }
    
    public static function hydrate(array $arr) : DataObjectDoubleSelector
    {
        $result = ValueSelector::hydrateBase(new DataObjectDoubleSelector(), $arr);
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        if (array_key_exists("objectPath", $arr))
        {
            $result->objectPath = array();
            foreach($arr["objectPath"] as &$value)
            {
                array_push($result->objectPath, $value);
            }
        }
        if (array_key_exists("objectFilter", $arr))
        {
            $result->objectFilter = DataObjectFilter::hydrate($arr["objectFilter"]);
        }
        return $result;
    }
    
    /** The data key on the target entity (e.g., product or variant data key) that contains the object or object list. */
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    
    /** The path within the data object that points to the numeric value to select. */
    function setObjectPath(string ... $objectPath)
    {
        $this->objectPath = $objectPath;
        return $this;
    }
    
    /**
     * The path within the data object that points to the numeric value to select.
     * @param string[] $objectPath new value.
     */
    function setObjectPathFromArray(array $objectPath)
    {
        $this->objectPath = $objectPath;
        return $this;
    }
    
    /** The path within the data object that points to the numeric value to select. */
    function addToObjectPath(string $objectPath)
    {
        if (!isset($this->objectPath))
        {
            $this->objectPath = array();
        }
        array_push($this->objectPath, $objectPath);
        return $this;
    }
    
    /** Optional filter applied when the data key contains an object list. */
    function setObjectFilter(?DataObjectFilter $objectFilter)
    {
        $this->objectFilter = $objectFilter;
        return $this;
    }
}
