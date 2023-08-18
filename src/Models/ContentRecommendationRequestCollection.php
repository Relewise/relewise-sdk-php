<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ContentRecommendationRequestCollection extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.ContentRecommendationRequestCollection, Relewise.Client";
    public array $requests;
    public bool $requireDistinctContentAcrossResults;
    public static function create(bool $requireDistinctContentsAcrossResults, ContentRecommendationRequest ... $requests) : ContentRecommendationRequestCollection
    {
        $result = new ContentRecommendationRequestCollection();
        $result->requireDistinctContentAcrossResults = $requireDistinctContentsAcrossResults;
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
        if (array_key_exists("requireDistinctContentAcrossResults", $arr))
        {
            $result->requireDistinctContentAcrossResults = $arr["requireDistinctContentAcrossResults"];
        }
        return $result;
    }
    function setRequests(ContentRecommendationRequest ... $requests)
    {
        $this->requests = $requests;
        return $this;
    }
    /**
     * Sets requests to a new value from an array.
     * @param ContentRecommendationRequest[] $requests new value.
     */
    function setRequestsFromArray(array $requests)
    {
        $this->requests = $requests;
        return $this;
    }
    /**
     * Adds a new element to requests.
     * @param ContentRecommendationRequest $requests new element.
     */
    function addToRequests(ContentRecommendationRequest $requests)
    {
        if (!isset($this->requests))
        {
            $this->requests = array();
        }
        array_push($this->requests, $requests);
        return $this;
    }
    function setRequireDistinctContentAcrossResults(bool $requireDistinctContentAcrossResults)
    {
        $this->requireDistinctContentAcrossResults = $requireDistinctContentAcrossResults;
        return $this;
    }
}
