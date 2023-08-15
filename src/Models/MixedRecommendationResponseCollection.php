<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class MixedRecommendationResponseCollection extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.MixedRecommendationResponseCollection, Relewise.Client";
    public array $responses;
    public static function create(RecommendationResponse ... $responses) : MixedRecommendationResponseCollection
    {
        $result = new MixedRecommendationResponseCollection();
        $result->responses = $responses;
        return $result;
    }
    public static function hydrate(array $arr) : MixedRecommendationResponseCollection
    {
        $result = TimedResponse::hydrateBase(new MixedRecommendationResponseCollection(), $arr);
        if (array_key_exists("responses", $arr))
        {
            $result->responses = array();
            foreach($arr["responses"] as &$value)
            {
                array_push($result->responses, RecommendationResponse::hydrate($value));
            }
        }
        return $result;
    }
    /**
     * Sets responses to a new value.
     * @param RecommendationResponse[] $responses new value.
     */
    function setResponses(RecommendationResponse ... $responses)
    {
        $this->responses = $responses;
        return $this;
    }
    /**
     * Sets responses to a new value from an array.
     * @param RecommendationResponse[] $responses new value.
     */
    function setResponsesFromArray(array $responses)
    {
        $this->responses = $responses;
        return $this;
    }
    /**
     * Adds a new element to responses.
     * @param RecommendationResponse $responses new element.
     */
    function addToResponses(RecommendationResponse $responses)
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
