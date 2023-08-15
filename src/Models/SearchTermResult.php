<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class SearchTermResult
{
    public string $typeDefinition = "Relewise.Client.DataTypes.SearchTermResult, Relewise.Client";
    public string $term;
    public int $rank;
    public array $expectedResultTypes;
    public static function create() : SearchTermResult
    {
        $result = new SearchTermResult();
        return $result;
    }
    public static function hydrate(array $arr) : SearchTermResult
    {
        $result = new SearchTermResult();
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
}
