<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class SearchTermPredictionResult
{
    public string $term;
    public int $rank;
    public array $expectedResultTypes;
    public SearchTermPredictionResultPredictionType $type;
    public array $correctedWordsMask;
    public static function create() : SearchTermPredictionResult
    {
        $result = new SearchTermPredictionResult();
        return $result;
    }
    public static function hydrate(array $arr) : SearchTermPredictionResult
    {
        $result = new SearchTermPredictionResult();
        if (array_key_exists("term", $arr))
        {
            $result->term = $arr["term"];
        }
        if (array_key_exists("rank", $arr))
        {
            $result->rank = $arr["rank"];
        }
        if (array_key_exists("expectedResultTypes", $arr))
        {
            $result->expectedResultTypes = array();
            foreach($arr["expectedResultTypes"] as &$value)
            {
                array_push($result->expectedResultTypes, ExpectedSearchTermResult::hydrate($value));
            }
        }
        if (array_key_exists("type", $arr))
        {
            $result->type = SearchTermPredictionResultPredictionType::from($arr["type"]);
        }
        if (array_key_exists("correctedWordsMask", $arr))
        {
            $result->correctedWordsMask = array();
            foreach($arr["correctedWordsMask"] as &$value)
            {
                array_push($result->correctedWordsMask, $value);
            }
        }
        return $result;
    }
    function withTerm(string $term)
    {
        $this->term = $term;
        return $this;
    }
    function withRank(int $rank)
    {
        $this->rank = $rank;
        return $this;
    }
    function withExpectedResultTypes(ExpectedSearchTermResult ... $expectedResultTypes)
    {
        $this->expectedResultTypes = $expectedResultTypes;
        return $this;
    }
    function withType(SearchTermPredictionResultPredictionType $type)
    {
        $this->type = $type;
        return $this;
    }
    function withCorrectedWordsMask(bool ... $correctedWordsMask)
    {
        $this->correctedWordsMask = $correctedWordsMask;
        return $this;
    }
}
