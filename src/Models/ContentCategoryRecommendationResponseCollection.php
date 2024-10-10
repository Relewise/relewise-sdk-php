<?php declare(strict_types=1);

namespace Relewise\Models;

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
    
    function setResponses(ContentCategoryRecommendationResponse ... $responses)
    {
        $this->responses = $responses;
        return $this;
    }
    
    /** @param ContentCategoryRecommendationResponse[] $responses new value. */
    function setResponsesFromArray(array $responses)
    {
        $this->responses = $responses;
        return $this;
    }
    
    function addToResponses(ContentCategoryRecommendationResponse $responses)
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
