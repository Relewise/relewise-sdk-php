<?php declare(strict_types=1);

namespace Relewise\Models;

class RequestFilterCriteria
{
    public FilterCollection $includes;
    public FilterCollection $excludes;
    public ?intRange $count;
    
    public static function create() : RequestFilterCriteria
    {
        $result = new RequestFilterCriteria();
        return $result;
    }
    
    public static function hydrate(array $arr) : RequestFilterCriteria
    {
        $result = new RequestFilterCriteria();
        if (array_key_exists("includes", $arr))
        {
            $result->includes = FilterCollection::hydrate($arr["includes"]);
        }
        if (array_key_exists("excludes", $arr))
        {
            $result->excludes = FilterCollection::hydrate($arr["excludes"]);
        }
        if (array_key_exists("count", $arr))
        {
            $result->count = intRange::hydrate($arr["count"]);
        }
        return $result;
    }
    
    function setIncludes(FilterCollection $includes)
    {
        $this->includes = $includes;
        return $this;
    }
    
    function setExcludes(FilterCollection $excludes)
    {
        $this->excludes = $excludes;
        return $this;
    }
    
    function setCount(?intRange $count)
    {
        $this->count = $count;
        return $this;
    }
}
