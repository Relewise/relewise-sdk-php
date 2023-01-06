<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

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
    function withRecommendations(ContentCategoryResult ... $recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }
    function withCustom(string $key, string $value)
    {
        if (!isset($this->custom))
        {
            $this->custom = array();
        }
        $this->custom[$key] = $value;
        return $this;
    }
    function withStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
