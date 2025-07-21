<?php declare(strict_types=1);

namespace Relewise\Models;

class RetailMediaSearchTermCondition extends SearchTermCondition
{
    public string $typeDefinition = "Relewise.Client.DataTypes.RetailMedia.RetailMediaSearchTermCondition, Relewise.Client";
    public Language $language;
    
    public static function create(Language $language) : RetailMediaSearchTermCondition
    {
        $result = new RetailMediaSearchTermCondition();
        $result->language = $language;
        $result->negated = false;
        return $result;
    }
    
    public static function hydrate(array $arr) : RetailMediaSearchTermCondition
    {
        $result = new RetailMediaSearchTermCondition();
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
        if (array_key_exists("negated", $arr))
        {
            $result->negated = $arr["negated"];
        }
        if (array_key_exists("language", $arr))
        {
            $result->language = Language::hydrate($arr["language"]);
        }
        return $result;
    }
    
    function setLanguage(Language $language)
    {
        $this->language = $language;
        return $this;
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
    
    /** @param ?SearchTermCondition[] $andConditions new value. */
    function setAndConditionsFromArray(array $andConditions)
    {
        $this->andConditions = $andConditions;
        return $this;
    }
    
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
    
    /** @param ?SearchTermCondition[] $orConditions new value. */
    function setOrConditionsFromArray(array $orConditions)
    {
        $this->orConditions = $orConditions;
        return $this;
    }
    
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
    
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
