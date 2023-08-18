<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class SearchTermCondition
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Configuration.SearchRules.SearchTermCondition, Relewise.Client";
    public ?SearchTermConditionConditionKind $kind;
    public ?string $value;
    public ?array $andConditions;
    public ?array $orConditions;
    public ?int $minimumLength;
    public static function create() : SearchTermCondition
    {
        $result = new SearchTermCondition();
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
        if (array_key_exists("minimumLength", $arr))
        {
            $result->minimumLength = $arr["minimumLength"];
        }
        return $result;
    }
    function setKind(?SearchTermConditionConditionKind $kind)
    {
        $this->kind = $kind;
        return $this;
    }
    function setValue(?string $value)
    {
        $this->value = $value;
        return $this;
    }
    function setAndConditions(SearchTermCondition ... $andConditions)
    {
        $this->andConditions = $andConditions;
        return $this;
    }
    /**
     * Sets andConditions to a new value from an array.
     * @param ?SearchTermCondition[] $andConditions new value.
     */
    function setAndConditionsFromArray(array $andConditions)
    {
        $this->andConditions = $andConditions;
        return $this;
    }
    /**
     * Adds a new element to andConditions.
     * @param SearchTermCondition $andConditions new element.
     */
    function addToAndConditions(SearchTermCondition $andConditions)
    {
        if (!isset($this->andConditions))
        {
            $this->andConditions = array();
        }
        array_push($this->andConditions, $andConditions);
        return $this;
    }
    function setOrConditions(SearchTermCondition ... $orConditions)
    {
        $this->orConditions = $orConditions;
        return $this;
    }
    /**
     * Sets orConditions to a new value from an array.
     * @param ?SearchTermCondition[] $orConditions new value.
     */
    function setOrConditionsFromArray(array $orConditions)
    {
        $this->orConditions = $orConditions;
        return $this;
    }
    /**
     * Adds a new element to orConditions.
     * @param SearchTermCondition $orConditions new element.
     */
    function addToOrConditions(SearchTermCondition $orConditions)
    {
        if (!isset($this->orConditions))
        {
            $this->orConditions = array();
        }
        array_push($this->orConditions, $orConditions);
        return $this;
    }
    function setMinimumLength(?int $minimumLength)
    {
        $this->minimumLength = $minimumLength;
        return $this;
    }
}
