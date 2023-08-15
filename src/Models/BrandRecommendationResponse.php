<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class BrandRecommendationResponse extends RecommendationResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.BrandRecommendationResponse, Relewise.Client";
    public array $recommendations;
    public static function create(BrandResult ... $recommendations) : BrandRecommendationResponse
    {
        $result = new BrandRecommendationResponse();
        $result->recommendations = $recommendations;
        return $result;
    }
    public static function hydrate(array $arr) : BrandRecommendationResponse
    {
        $result = RecommendationResponse::hydrateBase(new BrandRecommendationResponse(), $arr);
        if (array_key_exists("recommendations", $arr))
        {
            $result->recommendations = array();
            foreach($arr["recommendations"] as &$value)
            {
                array_push($result->recommendations, BrandResult::hydrate($value));
            }
        }
        return $result;
    }
    /**
     * Sets recommendations to a new value.
     * @param BrandResult[] $recommendations new value.
     */
    function setRecommendations(BrandResult ... $recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }
    /**
     * Sets recommendations to a new value from an array.
     * @param BrandResult[] $recommendations new value.
     */
    function setRecommendationsFromArray(array $recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }
    /**
     * Adds a new element to recommendations.
     * @param BrandResult $recommendations new element.
     */
    function addToRecommendations(BrandResult $recommendations)
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
