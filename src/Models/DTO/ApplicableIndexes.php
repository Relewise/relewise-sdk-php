<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ApplicableIndexes
{
    public array $indexes;
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
    function setIndexes(string ... $indexes)
    {
        $this->indexes = $indexes;
        return $this;
    }
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
