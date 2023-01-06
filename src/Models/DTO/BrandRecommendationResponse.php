<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

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
    function withRecommendations(BrandResult ... $recommendations)
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
