<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

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
    function withResponses(SearchResponse ... $responses)
    {
        $this->responses = $responses;
        return $this;
    }
    function withCustom(string $key, string $value)
    {
        if (!isset($this->custom))
        {
            $this->custom = array();
        }
        $this->custom[$key] = $value;
        return $this;
    }
    function withStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
