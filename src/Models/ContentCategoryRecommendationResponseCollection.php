<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ContentCategoryRecommendationResponseCollection extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.ContentCategoryRecommendationResponseCollection, Relewise.Client";
    public array $responses;
    public static function create(ContentCategoryRecommendationResponse ... $responses) : ContentCategoryRecommendationResponseCollection
    {
        $result = new ContentCategoryRecommendationResponseCollection();
        $result->responses = $responses;
        return $result;
    }
    public static function hydrate(array $arr) : ContentCategoryRecommendationResponseCollection
    {
        $result = TimedResponse::hydrateBase(new ContentCategoryRecommendationResponseCollection(), $arr);
        if (array_key_exists("responses", $arr))
        {
            $result->responses = array();
            foreach($arr["responses"] as &$value)
            {
                array_push($result->responses, ContentCategoryRecommendationResponse::hydrate($value));
            }
        }
        return $result;
    }
    /**
     * Sets responses to a new value.
     * @param ContentCategoryRecommendationResponse[] $responses new value.
     */
    function setResponses(ContentCategoryRecommendationResponse ... $responses)
    {
        $this->responses = $responses;
        return $this;
    }
    /**
     * Sets responses to a new value from an array.
     * @param ContentCategoryRecommendationResponse[] $responses new value.
     */
    function setResponsesFromArray(array $responses)
    {
        $this->responses = $responses;
        return $this;
    }
    /**
     * Adds a new element to responses.
     * @param ContentCategoryRecommendationResponse $responses new element.
     */
    function addToResponses(ContentCategoryRecommendationResponse $responses)
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
