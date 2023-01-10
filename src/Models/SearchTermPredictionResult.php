<?php declare(strict_types=1);

namespace Relewise\Models;

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
    function setTerm(string $term)
    {
        $this->term = $term;
        return $this;
    }
    function setRank(int $rank)
    {
        $this->rank = $rank;
        return $this;
    }
    function setExpectedResultTypes(ExpectedSearchTermResult ... $expectedResultTypes)
    {
        $this->expectedResultTypes = $expectedResultTypes;
        return $this;
    }
    function addToExpectedResultTypes(ExpectedSearchTermResult $expectedResultTypes)
    {
        if (!isset($this->expectedResultTypes))
        {
            $this->expectedResultTypes = array();
        }
        array_push($this->expectedResultTypes, $expectedResultTypes);
        return $this;
    }
    function setType(SearchTermPredictionResultPredictionType $type)
    {
        $this->type = $type;
        return $this;
    }
    function setCorrectedWordsMask(bool ... $correctedWordsMask)
    {
        $this->correctedWordsMask = $correctedWordsMask;
        return $this;
    }
    function addToCorrectedWordsMask(bool $correctedWordsMask)
    {
        if (!isset($this->correctedWordsMask))
        {
            $this->correctedWordsMask = array();
        }
        array_push($this->correctedWordsMask, $correctedWordsMask);
        return $this;
    }
}
