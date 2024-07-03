<?php declare(strict_types=1);

namespace Relewise\Models;

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
    function setResponses(RecommendationResponse ... $responses)
    {
        $this->responses = $responses;
        return $this;
    }
    /** @param RecommendationResponse[] $responses new value. */
    function setResponsesFromArray(array $responses)
    {
        $this->responses = $responses;
        return $this;
    }
    function addToResponses(RecommendationResponse $responses)
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
