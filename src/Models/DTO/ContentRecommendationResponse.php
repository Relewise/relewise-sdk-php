<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

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
    function withRecommendations(ContentResult ... $recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }
    function withStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
