<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class VariantDataRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.VariantDataRelevanceModifier, Relewise.Client";
    public string $key;
    public bool $considerAsMatchIfKeyIsNotFound;
    public float $multiplyWeightBy;
    public bool $mustMatchAllConditions;
    public array $conditions;
    public ValueSelector $multiplierSelector;
    public static function create(string $key, ValueSelector $multiplierSelector, bool $mustMatchAllConditions = true, bool $considerAsMatchIfKeyIsNotFound = false) : VariantDataRelevanceModifier
    {
        $result = new VariantDataRelevanceModifier();
        $result->key = $key;
        $result->multiplierSelector = $multiplierSelector;
        $result->mustMatchAllConditions = $mustMatchAllConditions;
        $result->considerAsMatchIfKeyIsNotFound = $considerAsMatchIfKeyIsNotFound;
        return $result;
    }
    public static function hydrate(array $arr) : VariantDataRelevanceModifier
    {
        $result = RelevanceModifier::hydrateBase(new VariantDataRelevanceModifier(), $arr);
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        if (array_key_exists("considerAsMatchIfKeyIsNotFound", $arr))
        {
            $result->considerAsMatchIfKeyIsNotFound = $arr["considerAsMatchIfKeyIsNotFound"];
        }
        if (array_key_exists("multiplyWeightBy", $arr))
        {
            $result->multiplyWeightBy = $arr["multiplyWeightBy"];
        }
        if (array_key_exists("mustMatchAllConditions", $arr))
        {
            $result->mustMatchAllConditions = $arr["mustMatchAllConditions"];
        }
        if (array_key_exists("conditions", $arr))
        {
            $result->conditions = array();
            foreach($arr["conditions"] as &$value)
            {
                array_push($result->conditions, ValueCondition::hydrate($value));
            }
        }
        if (array_key_exists("multiplierSelector", $arr))
        {
            $result->multiplierSelector = ValueSelector::hydrate($arr["multiplierSelector"]);
        }
        return $result;
    }
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    function setConsiderAsMatchIfKeyIsNotFound(bool $considerAsMatchIfKeyIsNotFound)
    {
        $this->considerAsMatchIfKeyIsNotFound = $considerAsMatchIfKeyIsNotFound;
        return $this;
    }
    function setMultiplyWeightBy(float $multiplyWeightBy)
    {
        $this->multiplyWeightBy = $multiplyWeightBy;
        return $this;
    }
    function setMustMatchAllConditions(bool $mustMatchAllConditions)
    {
        $this->mustMatchAllConditions = $mustMatchAllConditions;
        return $this;
    }
    function setConditions(ValueCondition ... $conditions)
    {
        $this->conditions = $conditions;
        return $this;
    }
    function setConditionsFromArray(array $conditions)
    {
        $this->conditions = $conditions;
        return $this;
    }
    function addToConditions(ValueCondition $conditions)
    {
        if (!isset($this->conditions))
        {
            $this->conditions = array();
        }
        array_push($this->conditions, $conditions);
        return $this;
    }
    function setMultiplierSelector(ValueSelector $multiplierSelector)
    {
        $this->multiplierSelector = $multiplierSelector;
        return $this;
    }
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
}
