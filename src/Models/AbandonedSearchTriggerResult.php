<?php declare(strict_types=1);

namespace Relewise\Models;

class AbandonedSearchTriggerResult
{
    public UserResultDetails $user;
    public SearchType $type;
    public array $searches;
    public static function create() : AbandonedSearchTriggerResult
    {
        $result = new AbandonedSearchTriggerResult();
        return $result;
    }
    public static function hydrate(array $arr) : AbandonedSearchTriggerResult
    {
        $result = new AbandonedSearchTriggerResult();
        if (array_key_exists("user", $arr))
        {
            $result->user = UserResultDetails::hydrate($arr["user"]);
        }
        if (array_key_exists("type", $arr))
        {
            $result->type = SearchType::from($arr["type"]);
        }
        if (array_key_exists("searches", $arr))
        {
            $result->searches = array();
            foreach($arr["searches"] as &$value)
            {
                array_push($result->searches, AbandonedSearch::hydrate($value));
            }
        }
        return $result;
    }
    
    function setUser(UserResultDetails $user)
    {
        $this->user = $user;
        return $this;
    }
    
    function setType(SearchType $type)
    {
        $this->type = $type;
        return $this;
    }
    
    function setSearches(AbandonedSearch ... $searches)
    {
        $this->searches = $searches;
        return $this;
    }
    
    /** @param AbandonedSearch[] $searches new value. */
    function setSearchesFromArray(array $searches)
    {
        $this->searches = $searches;
        return $this;
    }
    
    function addToSearches(AbandonedSearch $searches)
    {
        if (!isset($this->searches))
        {
            $this->searches = array();
        }
        array_push($this->searches, $searches);
        return $this;
    }
}
