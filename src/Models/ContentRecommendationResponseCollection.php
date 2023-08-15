<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ContentRecommendationResponseCollection extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.ContentRecommendationResponseCollection, Relewise.Client";
    public array $responses;
    public static function create(ContentRecommendationResponse ... $responses) : ContentRecommendationResponseCollection
    {
        $result = new ContentRecommendationResponseCollection();
        $result->responses = $responses;
        return $result;
    }
    public static function hydrate(array $arr) : ContentRecommendationResponseCollection
    {
        $result = TimedResponse::hydrateBase(new ContentRecommendationResponseCollection(), $arr);
        if (array_key_exists("responses", $arr))
        {
            $result->responses = array();
            foreach($arr["responses"] as &$value)
            {
                array_push($result->responses, ContentRecommendationResponse::hydrate($value));
            }
        }
        return $result;
    }
    /**
     * Sets responses to a new value.
     * @param ContentRecommendationResponse[] $responses new value.
     */
    function setResponses(ContentRecommendationResponse ... $responses)
    {
        $this->responses = $responses;
        return $this;
    }
    /**
     * Sets responses to a new value from an array.
     * @param ContentRecommendationResponse[] $responses new value.
     */
    function setResponsesFromArray(array $responses)
    {
        $this->responses = $responses;
        return $this;
    }
    /**
     * Adds a new element to responses.
     * @param ContentRecommendationResponse $responses new element.
     */
    function addToResponses(ContentRecommendationResponse $responses)
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
