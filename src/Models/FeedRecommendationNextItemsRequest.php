<?php declare(strict_types=1);

namespace Relewise\Models;

/** A lightweight request for the next page of recommendations for an already initialized feed. A new feed must first be initialized using FeedRecommendationInitializationRequest before this request can be made. */
class FeedRecommendationNextItemsRequest extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.Feed.FeedRecommendationNextItemsRequest, Relewise.Client";
    /** The ID of the initialized feed to get the next page of recommendations from. This ID is first returned as InitializedFeedId as a result of a successful FeedRecommendationInitializationRequest. */
    public string $initializedFeedId;
    
    /**
     * Initializes a new instance of the FeedRecommendationNextItemsRequest class for fetching subsequent pages of a feed already initialized via FeedRecommendationInitializationRequest.
     * @param string $initializedFeedId The ID of the initialized feed to get the next page of recommendations for.
     */
    public static function create(string $initializedFeedId) : FeedRecommendationNextItemsRequest
    {
        $result = new FeedRecommendationNextItemsRequest();
        $result->initializedFeedId = $initializedFeedId;
        return $result;
    }
    
    public static function hydrate(array $arr) : FeedRecommendationNextItemsRequest
    {
        $result = LicensedRequest::hydrateBase(new FeedRecommendationNextItemsRequest(), $arr);
        if (array_key_exists("initializedFeedId", $arr))
        {
            $result->initializedFeedId = $arr["initializedFeedId"];
        }
        return $result;
    }
    
    /** The ID of the initialized feed to get the next page of recommendations from. This ID is first returned as InitializedFeedId as a result of a successful FeedRecommendationInitializationRequest. */
    function setInitializedFeedId(string $initializedFeedId)
    {
        $this->initializedFeedId = $initializedFeedId;
        return $this;
    }
}
