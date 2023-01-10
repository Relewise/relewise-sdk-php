<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ContentCategoryRecommendationRequestCollection extends LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.ContentCategoryRecommendationRequestCollection, Relewise.Client";
    public array $requests;
    public bool $requireDistinctContentAcrossResults;
    public static function create(bool $requireDistinctContentsAcrossResults, ContentCategoryRecommendationRequest ... $requests) : ContentCategoryRecommendationRequestCollection
    {
        $result = new ContentCategoryRecommendationRequestCollection();
        $result->requireDistinctContentAcrossResults = $requireDistinctContentsAcrossResults;
        $result->requests = $requests;
        return $result;
    }
    public static function hydrate(array $arr) : ContentCategoryRecommendationRequestCollection
    {
        $result = LicensedRequest::hydrateBase(new ContentCategoryRecommendationRequestCollection(), $arr);
        if (array_key_exists("requests", $arr))
        {
            $result->requests = array();
            foreach($arr["requests"] as &$value)
            {
                array_push($result->requests, ContentCategoryRecommendationRequest::hydrate($value));
            }
        }
        if (array_key_exists("requireDistinctContentAcrossResults", $arr))
        {
            $result->requireDistinctContentAcrossResults = $arr["requireDistinctContentAcrossResults"];
        }
        return $result;
    }
    function setRequests(ContentCategoryRecommendationRequest ... $requests)
    {
        $this->requests = $requests;
        return $this;
    }
    function addToRequests(ContentCategoryRecommendationRequest $requests)
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
