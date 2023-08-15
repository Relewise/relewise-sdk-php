<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class SearchTermPredictionResponse extends SearchResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.Search.SearchTermPredictionResponse, Relewise.Client";
    public array $predictions;
    public static function create() : SearchTermPredictionResponse
    {
        $result = new SearchTermPredictionResponse();
        return $result;
    }
    public static function hydrate(array $arr) : SearchTermPredictionResponse
    {
        $result = SearchResponse::hydrateBase(new SearchTermPredictionResponse(), $arr);
        if (array_key_exists("predictions", $arr))
        {
            $result->predictions = array();
            foreach($arr["predictions"] as &$value)
            {
                array_push($result->predictions, SearchTermPredictionResult::hydrate($value));
            }
        }
        return $result;
    }
    /**
     * Sets predictions to a new value.
     * @param SearchTermPredictionResult[] $predictions new value.
     */
    function setPredictions(SearchTermPredictionResult ... $predictions)
    {
        $this->predictions = $predictions;
        return $this;
    }
    /**
     * Sets predictions to a new value from an array.
     * @param SearchTermPredictionResult[] $predictions new value.
     */
    function setPredictionsFromArray(array $predictions)
    {
        $this->predictions = $predictions;
        return $this;
    }
    /**
     * Adds a new element to predictions.
     * @param SearchTermPredictionResult $predictions new element.
     */
    function addToPredictions(SearchTermPredictionResult $predictions)
    {
        if (!isset($this->predictions))
        {
            $this->predictions = array();
        }
        array_push($this->predictions, $predictions);
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
