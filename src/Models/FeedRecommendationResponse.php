<?php declare(strict_types=1);

namespace Relewise\Models;

/** The response type for FeedRecommendationInitializationRequest for initialization and retrieval of the first page of results, and FeedRecommendationNextItemsRequest for subsequent pages of results. Contains the initialized feed ID and a collection of FeedCompositionResult which may contain either product or content results, depending on the request composition configuration. */
class FeedRecommendationResponse extends RecommendationResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.FeedRecommendationResponse, Relewise.Client";
    /** The ID of the initialized feed. This ID is needed in future requests of type FeedRecommendationNextItemsRequest to retrieve additional results for the initialized feed. Once a feed has been initialized via FeedRecommendationInitializationRequest, the returned InitializedFeedId can be stored and reused to retrieve all subsequent pages of results using FeedRecommendationNextItemsRequest. */
    public string $initializedFeedId;
    /** The feed recommendations consisting of a collection of FeedCompositionResult, each containing either product or content results, and optionally the composition name if requested. Note: May contain empty cFeedComposition if requested via IncludeEmptyResults. */
    public array $recommendations;
    
    /**
     * Initializes a new instance of the FeedRecommendationResponse class with the specified feed ID.
     * @param string $initializedFeedId The ID of the initialized feed.
     * @param FeedCompositionResult[] $recommendations The recommended feed items
     */
    public static function create(string $initializedFeedId, FeedCompositionResult ... $recommendations) : FeedRecommendationResponse
    {
        $result = new FeedRecommendationResponse();
        $result->initializedFeedId = $initializedFeedId;
        $result->recommendations = $recommendations;
        return $result;
    }
    
    public static function hydrate(array $arr) : FeedRecommendationResponse
    {
        $result = RecommendationResponse::hydrateBase(new FeedRecommendationResponse(), $arr);
        if (array_key_exists("initializedFeedId", $arr))
        {
            $result->initializedFeedId = $arr["initializedFeedId"];
        }
        if (array_key_exists("recommendations", $arr))
        {
            $result->recommendations = array();
            foreach($arr["recommendations"] as &$value)
            {
                array_push($result->recommendations, FeedCompositionResult::hydrate($value));
            }
        }
        return $result;
    }
    
    /** The ID of the initialized feed. This ID is needed in future requests of type FeedRecommendationNextItemsRequest to retrieve additional results for the initialized feed. Once a feed has been initialized via FeedRecommendationInitializationRequest, the returned InitializedFeedId can be stored and reused to retrieve all subsequent pages of results using FeedRecommendationNextItemsRequest. */
    function setInitializedFeedId(string $initializedFeedId)
    {
        $this->initializedFeedId = $initializedFeedId;
        return $this;
    }
    
    /** The feed recommendations consisting of a collection of FeedCompositionResult, each containing either product or content results, and optionally the composition name if requested. Note: May contain empty cFeedComposition if requested via IncludeEmptyResults. */
    function setRecommendations(FeedCompositionResult ... $recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }
    
    /**
     * The feed recommendations consisting of a collection of FeedCompositionResult, each containing either product or content results, and optionally the composition name if requested. Note: May contain empty cFeedComposition if requested via IncludeEmptyResults.
     * @param FeedCompositionResult[] $recommendations new value.
     */
    function setRecommendationsFromArray(array $recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }
    
    /** The feed recommendations consisting of a collection of FeedCompositionResult, each containing either product or content results, and optionally the composition name if requested. Note: May contain empty cFeedComposition if requested via IncludeEmptyResults. */
    function addToRecommendations(FeedCompositionResult $recommendations)
    {
        if (!isset($this->recommendations))
        {
            $this->recommendations = array();
        }
        array_push($this->recommendations, $recommendations);
        return $this;
    }
    
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
