<?php declare(strict_types=1);

namespace Relewise\Models;

class SearchTypeCollection
{
    public array $unionCodes;
    
    public static function create() : SearchTypeCollection
    {
        $result = new SearchTypeCollection();
        return $result;
    }
    
    public static function hydrate(array $arr) : SearchTypeCollection
    {
        $result = new SearchTypeCollection();
        if (array_key_exists("unionCodes", $arr))
        {
            $result->unionCodes = array();
            foreach($arr["unionCodes"] as &$value)
            {
                array_push($result->unionCodes, $value);
            }
        }
        return $result;
    }
    
    function setUnionCodes(int ... $unionCodes)
    {
        $this->unionCodes = $unionCodes;
        return $this;
    }
    
    /** @param int[] $unionCodes new value. */
    function setUnionCodesFromArray(array $unionCodes)
    {
        $this->unionCodes = $unionCodes;
        return $this;
    }
    
    function addToUnionCodes(int $unionCodes)
    {
        if (!isset($this->unionCodes))
        {
            $this->unionCodes = array();
        }
        array_push($this->unionCodes, $unionCodes);
        return $this;
    }
}
