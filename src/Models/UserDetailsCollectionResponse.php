<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class UserDetailsCollectionResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.UserDetailsCollectionResponse, Relewise.Client";
    public array $results;
    public static function create(array ... $results) : UserDetailsCollectionResponse
    {
        $result = new UserDetailsCollectionResponse();
        $result->results = $results;
        return $result;
    }
    public static function hydrate(array $arr) : UserDetailsCollectionResponse
    {
        $result = TimedResponse::hydrateBase(new UserDetailsCollectionResponse(), $arr);
        if (array_key_exists("results", $arr))
        {
            $result->results = array();
            foreach($arr["results"] as &$value)
            {
                array_push($result->results, $value);
            }
        }
        return $result;
    }
    /**
     * Sets results to a new value.
     * @param array[] $results new value.
     */
    function setResults(array ... $results)
    {
        $this->results = $results;
        return $this;
    }
    /**
     * Sets results to a new value from an array.
     * @param array[] $results new value.
     */
    function setResultsFromArray(array $results)
    {
        $this->results = $results;
        return $this;
    }
    /**
     * Adds a new element to results.
     * @param UserResultDetails[] $results new element.
     */
    function addToResults(array $results)
    {
        if (!isset($this->results))
        {
            $this->results = array();
        }
        array_push($this->results, $results);
        return $this;
    }
    /**
     * Sets statistics to a new value.
     * @param Statistics $statistics new value.
     */
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
