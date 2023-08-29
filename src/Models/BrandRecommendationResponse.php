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
    function setRecommendations(BrandResult ... $recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }
    /** @param BrandResult[] $recommendations new value. */
    function setRecommendationsFromArray(array $recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }
    function addToRecommendations(BrandResult $recommendations)
    {
        if (!isset($this->recommendations))
        {
            $this->recommendations = array();
        }
        array_push($this->recommendations, $recommendations);
        return $this;
    }
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
