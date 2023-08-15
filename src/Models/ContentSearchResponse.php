<?php declare(strict_types=1);

namespace Relewise\Models;

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
    /**
     * Sets results to a new value.
     * @param ContentResult[] $results new value.
     */
    function setResults(ContentResult ... $results)
    {
        $this->results = $results;
        return $this;
    }
    /**
     * Sets results to a new value from an array.
     * @param ContentResult[] $results new value.
     */
    function setResultsFromArray(array $results)
    {
        $this->results = $results;
        return $this;
    }
    /**
     * Adds a new element to results.
     * @param ContentResult $results new element.
     */
    function addToResults(ContentResult $results)
    {
        if (!isset($this->results))
        {
            $this->results = array();
        }
        array_push($this->results, $results);
        return $this;
    }
    /**
     * Sets facets to a new value.
     * @param ContentFacetResult $facets new value.
     */
    function setFacets(ContentFacetResult $facets)
    {
        $this->facets = $facets;
        return $this;
    }
    /**
     * Sets recommendations to a new value.
     * @param ContentResult[] $recommendations new value.
     */
    function setRecommendations(ContentResult ... $recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }
    /**
     * Sets recommendations to a new value from an array.
     * @param ContentResult[] $recommendations new value.
     */
    function setRecommendationsFromArray(array $recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }
    /**
     * Adds a new element to recommendations.
     * @param ContentResult $recommendations new element.
     */
    function addToRecommendations(ContentResult $recommendations)
    {
        if (!isset($this->recommendations))
        {
            $this->recommendations = array();
        }
        array_push($this->recommendations, $recommendations);
        return $this;
    }
    /**
     * Sets hits to a new value.
     * @param int $hits new value.
     */
    function setHits(int $hits)
    {
        $this->hits = $hits;
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
