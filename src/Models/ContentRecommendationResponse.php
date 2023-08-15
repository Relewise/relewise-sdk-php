<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ContentRecommendationResponse extends RecommendationResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.ContentRecommendationResponse, Relewise.Client";
    public array $recommendations;
    public static function create(ContentResult ... $recommendations) : ContentRecommendationResponse
    {
        $result = new ContentRecommendationResponse();
        $result->recommendations = $recommendations;
        return $result;
    }
    public static function hydrate(array $arr) : ContentRecommendationResponse
    {
        $result = RecommendationResponse::hydrateBase(new ContentRecommendationResponse(), $arr);
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
     * Sets statistics to a new value.
     * @param Statistics $statistics new value.
     */
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
