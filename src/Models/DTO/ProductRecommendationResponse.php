<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductRecommendationResponse extends RecommendationResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.ProductRecommendationResponse, Relewise.Client";
    public array $recommendations;
    public static function create(ProductResult ... $recommendations) : ProductRecommendationResponse
    {
        $result = new ProductRecommendationResponse();
        $result->recommendations = $recommendations;
        return $result;
    }
    public static function hydrate(array $arr) : ProductRecommendationResponse
    {
        $result = RecommendationResponse::hydrateBase(new ProductRecommendationResponse(), $arr);
        if (array_key_exists("recommendations", $arr))
        {
            $result->recommendations = array();
            foreach($arr["recommendations"] as &$value)
            {
                array_push($result->recommendations, ProductResult::hydrate($value));
            }
        }
        return $result;
    }
    function withRecommendations(ProductResult ... $recommendations)
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
