<?php declare(strict_types=1);

namespace Relewise\Models;

class SearchTermCriteria
{
    public ?SearchTermCriteriaSearchTermPolicy $policy;
    public ?SearchTermConditionByLanguageCollection $termCriteria;
    
    public static function create() : SearchTermCriteria
    {
        $result = new SearchTermCriteria();
        return $result;
    }
    
    public static function hydrate(array $arr) : SearchTermCriteria
    {
        $result = new SearchTermCriteria();
        if (array_key_exists("policy", $arr))
        {
            $result->policy = SearchTermCriteriaSearchTermPolicy::from($arr["policy"]);
        }
        if (array_key_exists("termCriteria", $arr))
        {
            $result->termCriteria = SearchTermConditionByLanguageCollection::hydrate($arr["termCriteria"]);
        }
        return $result;
    }
    
    function setPolicy(?SearchTermCriteriaSearchTermPolicy $policy)
    {
        $this->policy = $policy;
        return $this;
    }
    
    function setTermCriteria(?SearchTermConditionByLanguageCollection $termCriteria)
    {
        $this->termCriteria = $termCriteria;
        return $this;
    }
}
