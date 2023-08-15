<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class AbandonedSearchTriggerResult
{
    public string $typeDefinition = "Relewise.Client.Responses.Triggers.Results.AbandonedSearchTriggerResult, Relewise.Client";
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
    /**
     * Sets user to a new value.
     * @param UserResultDetails $user new value.
     */
    function setUser(UserResultDetails $user)
    {
        $this->user = $user;
        return $this;
    }
    /**
     * Sets type to a new value.
     * @param SearchType $type new value.
     */
    function setType(SearchType $type)
    {
        $this->type = $type;
        return $this;
    }
    /**
     * Sets searches to a new value.
     * @param AbandonedSearch[] $searches new value.
     */
    function setSearches(AbandonedSearch ... $searches)
    {
        $this->searches = $searches;
        return $this;
    }
    /**
     * Sets searches to a new value from an array.
     * @param AbandonedSearch[] $searches new value.
     */
    function setSearchesFromArray(array $searches)
    {
        $this->searches = $searches;
        return $this;
    }
    /**
     * Adds a new element to searches.
     * @param AbandonedSearch $searches new element.
     */
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
