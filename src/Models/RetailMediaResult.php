<?php declare(strict_types=1);

namespace Relewise\Models;

class RetailMediaResult
{
    public ?array $placements;
    
    public static function create() : RetailMediaResult
    {
        $result = new RetailMediaResult();
        return $result;
    }
    
    public static function hydrate(array $arr) : RetailMediaResult
    {
        $result = new RetailMediaResult();
        if (array_key_exists("placements", $arr))
        {
            $result->placements = array();
            foreach($arr["placements"] as $key => $value)
            {
                $result->placements[$key] = RetailMediaResultPlacement::hydrate($value);
            }
        }
        return $result;
    }
    
    function addToPlacements(string $key, RetailMediaResultPlacement $value)
    {
        if (!isset($this->placements))
        {
            $this->placements = array();
        }
        $this->placements[$key] = $value;
        return $this;
    }
    
    /** @param ?array<string, RetailMediaResultPlacement> $placements associative array. */
    function setPlacementsFromAssociativeArray(array $placements)
    {
        $this->placements = $placements;
        return $this;
    }
}
