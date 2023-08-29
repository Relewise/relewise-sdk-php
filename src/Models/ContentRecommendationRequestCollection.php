<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ContentRecommendationRequestCollection extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.ContentRecommendationRequestCollection, Relewise.Client";
    public array $requests;
    public bool $requireDistinctContentsAcrossResults;
    public static function create(bool $requireDistinctContentsAcrossResults, ContentRecommendationRequest ... $requests) : ContentRecommendationRequestCollection
    {
        $result = new ContentRecommendationRequestCollection();
        $result->requireDistinctContentsAcrossResults = $requireDistinctContentsAcrossResults;
        $result->requests = $requests;
        return $result;
    }
    public static function hydrate(array $arr) : ContentRecommendationRequestCollection
    {
        $result = LicensedRequest::hydrateBase(new ContentRecommendationRequestCollection(), $arr);
        if (array_key_exists("requests", $arr))
        {
            $result->requests = array();
            foreach($arr["requests"] as &$value)
            {
                array_push($result->requests, ContentRecommendationRequest::hydrate($value));
            }
        }
        if (array_key_exists("requireDistinctContentsAcrossResults", $arr))
        {
            $result->requireDistinctContentsAcrossResults = $arr["requireDistinctContentsAcrossResults"];
        }
        return $result;
    }
    function setRequests(ContentRecommendationRequest ... $requests)
    {
        $this->requests = $requests;
        return $this;
    }
    /** @param ContentRecommendationRequest[] $requests new value. */
    function setRequestsFromArray(array $requests)
    {
        $this->requests = $requests;
        return $this;
    }
    function addToRequests(ContentRecommendationRequest $requests)
    {
        if (!isset($this->requests))
        {
            $this->requests = array();
        }
        array_push($this->requests, $requests);
        return $this;
    }
    function setRequireDistinctContentsAcrossResults(bool $requireDistinctContentsAcrossResults)
    {
        $this->requireDistinctContentsAcrossResults = $requireDistinctContentsAcrossResults;
        return $this;
    }
}
