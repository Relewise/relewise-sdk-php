<?php declare(strict_types=1);

namespace Relewise\Models;

use JsonSerializable;

class ContentRecommendationRequestCollection extends LicensedRequest implements JsonSerializable
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.ContentRecommendationRequestCollection, Relewise.Client";
    public array $requests;
    public bool $requireDistinctContentsAcrossResults;
    /** Default context values used to determine which merchandising rules apply to requests in this batch, such as DeviceType=Mobile or SplitTestVariant=A. */
    public ?array $contextValues;
    
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
        if (array_key_exists("contextValues", $arr))
        {
            $result->contextValues = array();
            foreach($arr["contextValues"] as $key => $value)
            {
                $result->contextValues[$key] = $value;
            }
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
    
    /** Default context values used to determine which merchandising rules apply to requests in this batch, such as DeviceType=Mobile or SplitTestVariant=A. */
    function addToContextValues(string $key, string $value)
    {
        if (!isset($this->contextValues))
        {
            $this->contextValues = array();
        }
        $this->contextValues[$key] = $value;
        return $this;
    }
    
    /**
     * Default context values used to determine which merchandising rules apply to requests in this batch, such as DeviceType=Mobile or SplitTestVariant=A.
     * @param ?array<string, string> $contextValues associative array.
     */
    function setContextValuesFromAssociativeArray(array $contextValues)
    {
        $this->contextValues = $contextValues;
        return $this;
    }

    public function jsonSerialize(): mixed
    {
        $result = array();
        foreach ((array) $this as $name => $value)
        {
            // Private and protected property names contain a NUL byte when cast to an array.
            if (!str_contains((string) $name, "\0"))
            {
                $result[$name] = $value;
            }
        }
        if (isset($this->contextValues))
        {
            $result["contextValues"] = (object) $this->contextValues;
        }
        return (object) $result;
    }
}
