<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class SearchTermResult
{
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
}
