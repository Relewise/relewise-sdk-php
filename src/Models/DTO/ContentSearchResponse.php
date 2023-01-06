<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ContentSearchResponse extends PaginatedSearchResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.ContentSearchResponse, Relewise.Client";
    public array $results;
    public ContentFacetResult $facets;
    public array $recommendations;
    public static function create() : ContentSearchResponse
    {
        $result = new ContentSearchResponse();
        return $result;
    }
    public static function hydrate(array $arr) : ContentSearchResponse
    {
        $result = PaginatedSearchResponse::hydrateBase(new ContentSearchResponse(), $arr);
        if (array_key_exists("results", $arr))
        {
            $result->results = array();
            foreach($arr["results"] as &$value)
            {
                array_push($result->results, ContentResult::hydrate($value));
            }
        }
        if (array_key_exists("facets", $arr))
        {
            $result->facets = ContentFacetResult::hydrate($arr["facets"]);
        }
        if (array_key_exists("recommendations", $arr))
        {
            $result->recommendations = array();
            foreach($arr["recommendations"] as &$value)
            {
                array_push($result->recommendations, ContentResult::hydrate($value));
            }
        }
        return $result;
    }
    function withResults(ContentResult ... $results)
    {
        $this->results = $results;
        return $this;
    }
    function withFacets(ContentFacetResult $facets)
    {
        $this->facets = $facets;
        return $this;
    }
    function withRecommendations(ContentResult ... $recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }
    function withHits(int $hits)
    {
        $this->hits = $hits;
        return $this;
    }
    function withStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
