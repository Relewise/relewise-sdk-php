<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class SearchTermCondition
{
    public SearchTermConditionConditionKind $kind;
    public string $value;
    public ?array $andConditions;
    public ?array $orConditions;
    public static function create(SearchTermConditionConditionKind $kind, string $value) : SearchTermCondition
    {
        $result = new SearchTermCondition();
        $result->kind = $kind;
        $result->value = $value;
        return $result;
    }
    public static function hydrate(array $arr) : SearchTermCondition
    {
        $result = new SearchTermCondition();
        if (array_key_exists("kind", $arr))
        {
            $result->kind = SearchTermConditionConditionKind::from($arr["kind"]);
        }
        if (array_key_exists("value", $arr))
        {
            $result->value = $arr["value"];
        }
        if (array_key_exists("andConditions", $arr))
        {
            $result->andConditions = array();
            foreach($arr["andConditions"] as &$value)
            {
                array_push($result->andConditions, SearchTermCondition::hydrate($value));
            }
        }
        if (array_key_exists("orConditions", $arr))
        {
            $result->orConditions = array();
            foreach($arr["orConditions"] as &$value)
            {
                array_push($result->orConditions, SearchTermCondition::hydrate($value));
            }
        }
        return $result;
    }
    function withKind(SearchTermConditionConditionKind $kind)
    {
        $this->kind = $kind;
        return $this;
    }
    function withValue(string $value)
    {
        $this->value = $value;
        return $this;
    }
    function withAndConditions(SearchTermCondition ... $andConditions)
    {
        $this->andConditions = $andConditions;
        return $this;
    }
    function withOrConditions(SearchTermCondition ... $orConditions)
    {
        $this->orConditions = $orConditions;
        return $this;
    }
}
