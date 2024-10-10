<?php declare(strict_types=1);

namespace Relewise\Models;

class CartDataFilter extends Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.CartDataFilter, Relewise.Client";
    public string $key;
    public bool $filterOutIfKeyIsNotFound;
    public bool $mustMatchAllConditions;
    public ?ValueConditionCollection $conditions;
    public ?Language $language;
    public ?Currency $currency;
    
    public static function create(string $key, ?ValueConditionCollection $conditions = Null, bool $mustMatchAllConditions = true, bool $filterOutIfKeyIsNotFound = true, ?Language $language = Null, ?Currency $currency = Null) : CartDataFilter
    {
        $result = new CartDataFilter();
        $result->key = $key;
        $result->conditions = $conditions;
        $result->mustMatchAllConditions = $mustMatchAllConditions;
        $result->filterOutIfKeyIsNotFound = $filterOutIfKeyIsNotFound;
        $result->language = $language;
        $result->currency = $currency;
        return $result;
    }
    
    public static function hydrate(array $arr) : CartDataFilter
    {
        $result = Filter::hydrateBase(new CartDataFilter(), $arr);
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        if (array_key_exists("filterOutIfKeyIsNotFound", $arr))
        {
            $result->filterOutIfKeyIsNotFound = $arr["filterOutIfKeyIsNotFound"];
        }
        if (array_key_exists("mustMatchAllConditions", $arr))
        {
            $result->mustMatchAllConditions = $arr["mustMatchAllConditions"];
        }
        if (array_key_exists("conditions", $arr))
        {
            $result->conditions = ValueConditionCollection::hydrate($arr["conditions"]);
        }
        if (array_key_exists("language", $arr))
        {
            $result->language = Language::hydrate($arr["language"]);
        }
        if (array_key_exists("currency", $arr))
        {
            $result->currency = Currency::hydrate($arr["currency"]);
        }
        return $result;
    }
    
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    
    function setFilterOutIfKeyIsNotFound(bool $filterOutIfKeyIsNotFound)
    {
        $this->filterOutIfKeyIsNotFound = $filterOutIfKeyIsNotFound;
        return $this;
    }
    
    function setMustMatchAllConditions(bool $mustMatchAllConditions)
    {
        $this->mustMatchAllConditions = $mustMatchAllConditions;
        return $this;
    }
    
    function setConditions(?ValueConditionCollection $conditions)
    {
        $this->conditions = $conditions;
        return $this;
    }
    
    function setLanguage(?Language $language)
    {
        $this->language = $language;
        return $this;
    }
    
    function setCurrency(?Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
    
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
    
    function setSettings(?FilterSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
}
