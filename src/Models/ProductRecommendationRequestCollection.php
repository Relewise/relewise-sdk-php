<?php declare(strict_types=1);

namespace Relewise\Models;

use JsonSerializable;

class ProductRecommendationRequestCollection extends LicensedRequest implements JsonSerializable
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.ProductRecommendationRequestCollection, Relewise.Client";
    public array $requests;
    public bool $requireDistinctProductsAcrossResults;
    /** Default context values used to determine which merchandising rules apply to requests in this batch, such as DeviceType=Mobile or SplitTestVariant=A. */
    public ?array $contextValues;
    
    public static function create(bool $requireDistinctProductsAcrossResults, ProductRecommendationRequest ... $requests) : ProductRecommendationRequestCollection
    {
        $result = new ProductRecommendationRequestCollection();
        $result->requireDistinctProductsAcrossResults = $requireDistinctProductsAcrossResults;
        $result->requests = $requests;
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductRecommendationRequestCollection
    {
        $result = LicensedRequest::hydrateBase(new ProductRecommendationRequestCollection(), $arr);
        if (array_key_exists("requests", $arr))
        {
            $result->requests = array();
            foreach($arr["requests"] as &$value)
            {
                array_push($result->requests, ProductRecommendationRequest::hydrate($value));
            }
        }
        if (array_key_exists("requireDistinctProductsAcrossResults", $arr))
        {
            $result->requireDistinctProductsAcrossResults = $arr["requireDistinctProductsAcrossResults"];
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
    
    function setRequests(ProductRecommendationRequest ... $requests)
    {
        $this->requests = $requests;
        return $this;
    }
    
    /** @param ProductRecommendationRequest[] $requests new value. */
    function setRequestsFromArray(array $requests)
    {
        $this->requests = $requests;
        return $this;
    }
    
    function addToRequests(ProductRecommendationRequest $requests)
    {
        if (!isset($this->requests))
        {
            $this->requests = array();
        }
        array_push($this->requests, $requests);
        return $this;
    }
    
    function setRequireDistinctProductsAcrossResults(bool $requireDistinctProductsAcrossResults)
    {
        $this->requireDistinctProductsAcrossResults = $requireDistinctProductsAcrossResults;
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
