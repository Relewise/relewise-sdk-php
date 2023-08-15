<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class SearchTermPredictionResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.SearchTermPredictionResult, Relewise.Client";
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
    /**
     * Sets term to a new value.
     * @param string $term new value.
     */
    function setTerm(string $term)
    {
        $this->term = $term;
        return $this;
    }
    /**
     * Sets rank to a new value.
     * @param int $rank new value.
     */
    function setRank(int $rank)
    {
        $this->rank = $rank;
        return $this;
    }
    /**
     * Sets expectedResultTypes to a new value.
     * @param ExpectedSearchTermResult[] $expectedResultTypes new value.
     */
    function setExpectedResultTypes(ExpectedSearchTermResult ... $expectedResultTypes)
    {
        $this->expectedResultTypes = $expectedResultTypes;
        return $this;
    }
    /**
     * Sets expectedResultTypes to a new value from an array.
     * @param ExpectedSearchTermResult[] $expectedResultTypes new value.
     */
    function setExpectedResultTypesFromArray(array $expectedResultTypes)
    {
        $this->expectedResultTypes = $expectedResultTypes;
        return $this;
    }
    /**
     * Adds a new element to expectedResultTypes.
     * @param ExpectedSearchTermResult $expectedResultTypes new element.
     */
    function addToExpectedResultTypes(ExpectedSearchTermResult $expectedResultTypes)
    {
        if (!isset($this->expectedResultTypes))
        {
            $this->expectedResultTypes = array();
        }
        array_push($this->expectedResultTypes, $expectedResultTypes);
        return $this;
    }
    /**
     * Sets type to a new value.
     * @param SearchTermPredictionResultPredictionType $type new value.
     */
    function setType(SearchTermPredictionResultPredictionType $type)
    {
        $this->type = $type;
        return $this;
    }
    /**
     * Sets correctedWordsMask to a new value.
     * @param bool[] $correctedWordsMask new value.
     */
    function setCorrectedWordsMask(bool ... $correctedWordsMask)
    {
        $this->correctedWordsMask = $correctedWordsMask;
        return $this;
    }
    /**
     * Sets correctedWordsMask to a new value from an array.
     * @param bool[] $correctedWordsMask new value.
     */
    function setCorrectedWordsMaskFromArray(array $correctedWordsMask)
    {
        $this->correctedWordsMask = $correctedWordsMask;
        return $this;
    }
    /**
     * Adds a new element to correctedWordsMask.
     * @param bool $correctedWordsMask new element.
     */
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
