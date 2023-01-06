<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

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
    function withRecommendations(SearchTermResult ... $recommendations)
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
