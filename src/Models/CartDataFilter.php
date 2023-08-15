<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

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
    /**
     * Sets key to a new value.
     * @param string $key new value.
     */
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    /**
     * Sets filterOutIfKeyIsNotFound to a new value.
     * @param bool $filterOutIfKeyIsNotFound new value.
     */
    function setFilterOutIfKeyIsNotFound(bool $filterOutIfKeyIsNotFound)
    {
        $this->filterOutIfKeyIsNotFound = $filterOutIfKeyIsNotFound;
        return $this;
    }
    /**
     * Sets mustMatchAllConditions to a new value.
     * @param bool $mustMatchAllConditions new value.
     */
    function setMustMatchAllConditions(bool $mustMatchAllConditions)
    {
        $this->mustMatchAllConditions = $mustMatchAllConditions;
        return $this;
    }
    /**
     * Sets conditions to a new value.
     * @param ?ValueConditionCollection $conditions new value.
     */
    function setConditions(?ValueConditionCollection $conditions)
    {
        $this->conditions = $conditions;
        return $this;
    }
    /**
     * Sets language to a new value.
     * @param ?Language $language new value.
     */
    function setLanguage(?Language $language)
    {
        $this->language = $language;
        return $this;
    }
    /**
     * Sets currency to a new value.
     * @param ?Currency $currency new value.
     */
    function setCurrency(?Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
    /**
     * Sets negated to a new value.
     * @param bool $negated new value.
     */
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
}
