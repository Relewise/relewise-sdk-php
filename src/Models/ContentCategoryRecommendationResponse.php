<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ContentCategoryRecommendationResponse extends RecommendationResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.ContentCategoryRecommendationResponse, Relewise.Client";
    public array $recommendations;
    public static function create(ContentCategoryResult ... $recommendations) : ContentCategoryRecommendationResponse
    {
        $result = new ContentCategoryRecommendationResponse();
        $result->recommendations = $recommendations;
        return $result;
    }
    public static function hydrate(array $arr) : ContentCategoryRecommendationResponse
    {
        $result = RecommendationResponse::hydrateBase(new ContentCategoryRecommendationResponse(), $arr);
        if (array_key_exists("recommendations", $arr))
        {
            $result->recommendations = array();
            foreach($arr["recommendations"] as &$value)
            {
                array_push($result->recommendations, ContentCategoryResult::hydrate($value));
            }
        }
        return $result;
    }
    /**
     * Sets recommendations to a new value.
     * @param ContentCategoryResult[] $recommendations new value.
     */
    function setRecommendations(ContentCategoryResult ... $recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }
    /**
     * Sets recommendations to a new value from an array.
     * @param ContentCategoryResult[] $recommendations new value.
     */
    function setRecommendationsFromArray(array $recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }
    /**
     * Adds a new element to recommendations.
     * @param ContentCategoryResult $recommendations new element.
     */
    function addToRecommendations(ContentCategoryResult $recommendations)
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
