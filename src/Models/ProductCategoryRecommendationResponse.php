<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductCategoryRecommendationResponse extends RecommendationResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.ProductCategoryRecommendationResponse, Relewise.Client";
    public array $recommendations;
    public static function create(ProductCategoryResult ... $recommendations) : ProductCategoryRecommendationResponse
    {
        $result = new ProductCategoryRecommendationResponse();
        $result->recommendations = $recommendations;
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryRecommendationResponse
    {
        $result = RecommendationResponse::hydrateBase(new ProductCategoryRecommendationResponse(), $arr);
        if (array_key_exists("recommendations", $arr))
        {
            $result->recommendations = array();
            foreach($arr["recommendations"] as &$value)
            {
                array_push($result->recommendations, ProductCategoryResult::hydrate($value));
            }
        }
        return $result;
    }
    /**
     * Sets recommendations to a new value.
     * @param ProductCategoryResult[] $recommendations new value.
     */
    function setRecommendations(ProductCategoryResult ... $recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }
    /**
     * Sets recommendations to a new value from an array.
     * @param ProductCategoryResult[] $recommendations new value.
     */
    function setRecommendationsFromArray(array $recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }
    /**
     * Adds a new element to recommendations.
     * @param ProductCategoryResult $recommendations new element.
     */
    function addToRecommendations(ProductCategoryResult $recommendations)
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
