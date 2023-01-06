<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

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
    function withPredictions(SearchTermPredictionResult ... $predictions)
    {
        $this->predictions = $predictions;
        return $this;
    }
    function withStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
