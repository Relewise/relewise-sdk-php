<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

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
    function withResults(ProductPerformanceResult ... $results)
    {
        $this->results = $results;
        return $this;
    }
    function withTotalNumberOfResults(int $totalNumberOfResults)
    {
        $this->totalNumberOfResults = $totalNumberOfResults;
        return $this;
    }
    function withRemainingNumberOfResults(int $remainingNumberOfResults)
    {
        $this->remainingNumberOfResults = $remainingNumberOfResults;
        return $this;
    }
    function withStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
