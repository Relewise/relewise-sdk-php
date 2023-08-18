<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductCategoryRecommendationResponseCollection extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.ProductCategoryRecommendationResponseCollection, Relewise.Client";
    public array $responses;
    public static function create(ProductCategoryRecommendationResponse ... $responses) : ProductCategoryRecommendationResponseCollection
    {
        $result = new ProductCategoryRecommendationResponseCollection();
        $result->responses = $responses;
        return $result;
    }
    public static function hydrate(array $arr) : ProductCategoryRecommendationResponseCollection
    {
        $result = TimedResponse::hydrateBase(new ProductCategoryRecommendationResponseCollection(), $arr);
        if (array_key_exists("responses", $arr))
        {
            $result->responses = array();
            foreach($arr["responses"] as &$value)
            {
                array_push($result->responses, ProductCategoryRecommendationResponse::hydrate($value));
            }
        }
        return $result;
    }
    function setResponses(ProductCategoryRecommendationResponse ... $responses)
    {
        $this->responses = $responses;
        return $this;
    }
    /**
     * Sets responses to a new value from an array.
     * @param ProductCategoryRecommendationResponse[] $responses new value.
     */
    function setResponsesFromArray(array $responses)
    {
        $this->responses = $responses;
        return $this;
    }
    /**
     * Adds a new element to responses.
     * @param ProductCategoryRecommendationResponse $responses new element.
     */
    function addToResponses(ProductCategoryRecommendationResponse $responses)
    {
        if (!isset($this->responses))
        {
            $this->responses = array();
        }
        array_push($this->responses, $responses);
        return $this;
    }
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
