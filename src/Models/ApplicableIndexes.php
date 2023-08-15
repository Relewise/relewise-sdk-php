<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ApplicableIndexes
{
    public string $typeDefinition = "Relewise.Client.DataTypes.ApplicableIndexes, Relewise.Client";
    public array $indexes;
    const ALL = Null;
    public static function create(string ... $indexes) : ApplicableIndexes
    {
        $result = new ApplicableIndexes();
        $result->indexes = $indexes;
        return $result;
    }
    public static function hydrate(array $arr) : ApplicableIndexes
    {
        $result = new ApplicableIndexes();
        if (array_key_exists("indexes", $arr))
        {
            $result->indexes = array();
            foreach($arr["indexes"] as &$value)
            {
                array_push($result->indexes, $value);
            }
        }
        return $result;
    }
    /**
     * Sets indexes to a new value.
     * @param string[] $indexes new value.
     */
    function setIndexes(string ... $indexes)
    {
        $this->indexes = $indexes;
        return $this;
    }
    /**
     * Sets indexes to a new value from an array.
     * @param string[] $indexes new value.
     */
    function setIndexesFromArray(array $indexes)
    {
        $this->indexes = $indexes;
        return $this;
    }
    /**
     * Adds a new element to indexes.
     * @param string $indexes new element.
     */
    function addToIndexes(string $indexes)
    {
        if (!isset($this->indexes))
        {
            $this->indexes = array();
        }
        array_push($this->indexes, $indexes);
        return $this;
    }
}
