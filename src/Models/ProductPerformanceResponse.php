<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductPerformanceResponse extends TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Analyzers.ProductPerformanceResponse, Relewise.Client";
    public array $results;
    public int $totalNumberOfResults;
    public int $remainingNumberOfResults;
    public static function create() : ProductPerformanceResponse
    {
        $result = new ProductPerformanceResponse();
        return $result;
    }
    public static function hydrate(array $arr) : ProductPerformanceResponse
    {
        $result = TimedResponse::hydrateBase(new ProductPerformanceResponse(), $arr);
        if (array_key_exists("results", $arr))
        {
            $result->results = array();
            foreach($arr["results"] as &$value)
            {
                array_push($result->results, ProductPerformanceResult::hydrate($value));
            }
        }
        if (array_key_exists("totalNumberOfResults", $arr))
        {
            $result->totalNumberOfResults = $arr["totalNumberOfResults"];
        }
        if (array_key_exists("remainingNumberOfResults", $arr))
        {
            $result->remainingNumberOfResults = $arr["remainingNumberOfResults"];
        }
        return $result;
    }
    /**
     * Sets results to a new value.
     * @param ProductPerformanceResult[] $results new value.
     */
    function setResults(ProductPerformanceResult ... $results)
    {
        $this->results = $results;
        return $this;
    }
    /**
     * Sets results to a new value from an array.
     * @param ProductPerformanceResult[] $results new value.
     */
    function setResultsFromArray(array $results)
    {
        $this->results = $results;
        return $this;
    }
    /**
     * Adds a new element to results.
     * @param ProductPerformanceResult $results new element.
     */
    function addToResults(ProductPerformanceResult $results)
    {
        if (!isset($this->results))
        {
            $this->results = array();
        }
        array_push($this->results, $results);
        return $this;
    }
    /**
     * Sets totalNumberOfResults to a new value.
     * @param int $totalNumberOfResults new value.
     */
    function setTotalNumberOfResults(int $totalNumberOfResults)
    {
        $this->totalNumberOfResults = $totalNumberOfResults;
        return $this;
    }
    /**
     * Sets remainingNumberOfResults to a new value.
     * @param int $remainingNumberOfResults new value.
     */
    function setRemainingNumberOfResults(int $remainingNumberOfResults)
    {
        $this->remainingNumberOfResults = $remainingNumberOfResults;
        return $this;
    }
    /**
     * Sets statistics to a new value.
     * @param Statistics $statistics new value.
     */
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
