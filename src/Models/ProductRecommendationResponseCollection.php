<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductRecommendationResponseCollection extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.ProductRecommendationResponseCollection, Relewise.Client";
    public array $responses;
    public static function create(ProductRecommendationResponse ... $responses) : ProductRecommendationResponseCollection
    {
        $result = new ProductRecommendationResponseCollection();
        $result->responses = $responses;
        return $result;
    }
    public static function hydrate(array $arr) : ProductRecommendationResponseCollection
    {
        $result = TimedResponse::hydrateBase(new ProductRecommendationResponseCollection(), $arr);
        if (array_key_exists("responses", $arr))
        {
            $result->responses = array();
            foreach($arr["responses"] as &$value)
            {
                array_push($result->responses, ProductRecommendationResponse::hydrate($value));
            }
        }
        return $result;
    }
    /**
     * Sets responses to a new value.
     * @param ProductRecommendationResponse[] $responses new value.
     */
    function setResponses(ProductRecommendationResponse ... $responses)
    {
        $this->responses = $responses;
        return $this;
    }
    /**
     * Sets responses to a new value from an array.
     * @param ProductRecommendationResponse[] $responses new value.
     */
    function setResponsesFromArray(array $responses)
    {
        $this->responses = $responses;
        return $this;
    }
    /**
     * Adds a new element to responses.
     * @param ProductRecommendationResponse $responses new element.
     */
    function addToResponses(ProductRecommendationResponse $responses)
    {
        if (!isset($this->responses))
        {
            $this->responses = array();
        }
        array_push($this->responses, $responses);
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
