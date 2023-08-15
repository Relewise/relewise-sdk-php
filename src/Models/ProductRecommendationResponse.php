<?php declare(strict_types=1);

namespace Relewise\Models;

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
    /**
     * Sets recommendations to a new value.
     * @param ProductResult[] $recommendations new value.
     */
    function setRecommendations(ProductResult ... $recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }
    /**
     * Sets recommendations to a new value from an array.
     * @param ProductResult[] $recommendations new value.
     */
    function setRecommendationsFromArray(array $recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }
    /**
     * Adds a new element to recommendations.
     * @param ProductResult $recommendations new element.
     */
    function addToRecommendations(ProductResult $recommendations)
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
