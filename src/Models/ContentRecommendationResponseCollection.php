<?php declare(strict_types=1);

namespace Relewise\Models;

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
    
    function setResponses(ContentRecommendationResponse ... $responses)
    {
        $this->responses = $responses;
        return $this;
    }
    
    /** @param ContentRecommendationResponse[] $responses new value. */
    function setResponsesFromArray(array $responses)
    {
        $this->responses = $responses;
        return $this;
    }
    
    function addToResponses(ContentRecommendationResponse $responses)
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
