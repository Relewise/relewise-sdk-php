<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

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
}