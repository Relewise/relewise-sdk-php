<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class SearchTermRecommendationResponse extends RecommendationResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.SearchTermRecommendationResponse, Relewise.Client";
    public array $recommendations;
    public static function create() : SearchTermRecommendationResponse
    {
        $result = new SearchTermRecommendationResponse();
        return $result;
    }
    public static function hydrate(array $arr) : SearchTermRecommendationResponse
    {
        $result = RecommendationResponse::hydrateBase(new SearchTermRecommendationResponse(), $arr);
        if (array_key_exists("recommendations", $arr))
        {
            $result->recommendations = array();
            foreach($arr["recommendations"] as &$value)
            {
                array_push($result->recommendations, SearchTermResult::hydrate($value));
            }
        }
        return $result;
    }
    /**
     * Sets recommendations to a new value.
     * @param SearchTermResult[] $recommendations new value.
     */
    function setRecommendations(SearchTermResult ... $recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }
    /**
     * Sets recommendations to a new value from an array.
     * @param SearchTermResult[] $recommendations new value.
     */
    function setRecommendationsFromArray(array $recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }
    /**
     * Adds a new element to recommendations.
     * @param SearchTermResult $recommendations new element.
     */
    function addToRecommendations(SearchTermResult $recommendations)
    {
        if (!isset($this->recommendations))
        {
            $this->recommendations = array();
        }
        array_push($this->recommendations, $recommendations);
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
