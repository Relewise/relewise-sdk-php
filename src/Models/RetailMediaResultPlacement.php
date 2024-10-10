<?php declare(strict_types=1);

namespace Relewise\Models;

class RetailMediaResultPlacement
{
    public ?array $results;
    
    public static function create() : RetailMediaResultPlacement
    {
        $result = new RetailMediaResultPlacement();
        return $result;
    }
    
    public static function hydrate(array $arr) : RetailMediaResultPlacement
    {
        $result = new RetailMediaResultPlacement();
        if (array_key_exists("results", $arr))
        {
            $result->results = array();
            foreach($arr["results"] as &$value)
            {
                array_push($result->results, RetailMediaResultPlacementResultEntity::hydrate($value));
            }
        }
        return $result;
    }
    
    function setResults(RetailMediaResultPlacementResultEntity ... $results)
    {
        $this->results = $results;
        return $this;
    }
    
    /** @param ?RetailMediaResultPlacementResultEntity[] $results new value. */
    function setResultsFromArray(array $results)
    {
        $this->results = $results;
        return $this;
    }
    
    function addToResults(RetailMediaResultPlacementResultEntity $results)
    {
        if (!isset($this->results))
        {
            $this->results = array();
        }
        array_push($this->results, $results);
        return $this;
    }
}
