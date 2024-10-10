<?php declare(strict_types=1);

namespace Relewise\Models;

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
    
    function setRecommendations(ContentCategoryResult ... $recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }
    
    /** @param ContentCategoryResult[] $recommendations new value. */
    function setRecommendationsFromArray(array $recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }
    
    function addToRecommendations(ContentCategoryResult $recommendations)
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
