<?php declare(strict_types=1);

namespace Relewise\Models;

class SearchResponseCollection extends SearchResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.SearchResponseCollection, Relewise.Client";
    
    public array $responses;
    
    public static function create() : SearchResponseCollection
    {
        $result = new SearchResponseCollection();
        return $result;
    }
    
    public static function hydrate(array $arr) : SearchResponseCollection
    {
        $result = SearchResponse::hydrateBase(new SearchResponseCollection(), $arr);
        if (array_key_exists("responses", $arr))
        {
            $result->responses = array();
            foreach($arr["responses"] as &$value)
            {
                array_push($result->responses, SearchResponse::hydrate($value));
            }
        }
        return $result;
    }
    
    function setResponses(SearchResponse ... $responses)
    {
        $this->responses = $responses;
        return $this;
    }
    
    /** @param SearchResponse[] $responses new value. */
    function setResponsesFromArray(array $responses)
    {
        $this->responses = $responses;
        return $this;
    }
    
    function addToResponses(SearchResponse $responses)
    {
        if (!isset($this->responses))
        {
            $this->responses = array();
        }
        array_push($this->responses, $responses);
        return $this;
    }
    
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
