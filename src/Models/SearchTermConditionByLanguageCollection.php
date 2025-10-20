<?php declare(strict_types=1);

namespace Relewise\Models;

class SearchTermConditionByLanguageCollection
{
    public ?array $values;
    
    public static function create(SearchTermConditionByLanguage ... $languageSpecificSearchTermConditions) : SearchTermConditionByLanguageCollection
    {
        $result = new SearchTermConditionByLanguageCollection();
        $result->values = $languageSpecificSearchTermConditions;
        return $result;
    }
    
    public static function hydrate(array $arr) : SearchTermConditionByLanguageCollection
    {
        $result = new SearchTermConditionByLanguageCollection();
        if (array_key_exists("values", $arr))
        {
            $result->values = array();
            foreach($arr["values"] as &$value)
            {
                array_push($result->values, SearchTermConditionByLanguage::hydrate($value));
            }
        }
        return $result;
    }
    
    function setValues(SearchTermConditionByLanguage ... $values)
    {
        $this->values = $values;
        return $this;
    }
    
    /** @param ?SearchTermConditionByLanguage[] $values new value. */
    function setValuesFromArray(array $values)
    {
        $this->values = $values;
        return $this;
    }
    
    function addToValues(SearchTermConditionByLanguage $values)
    {
        if (!isset($this->values))
        {
            $this->values = array();
        }
        array_push($this->values, $values);
        return $this;
    }
}
