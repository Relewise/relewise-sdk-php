<?php declare(strict_types=1);

namespace Relewise\Models;

/** a RelevanceModifier that can change the relevance of a ContentCategory depending on matching conditions on a certain key. */
class ContentCategoryDataRelevanceModifier extends DataRelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.ContentCategoryDataRelevanceModifier, Relewise.Client";
    public static function create(string $key, ValueSelector $multiplierSelector, bool $considerAsMatchIfKeyIsNotFound = false) : ContentCategoryDataRelevanceModifier
    {
        $result = new ContentCategoryDataRelevanceModifier();
        $result->key = $key;
        $result->multiplierSelector = $multiplierSelector;
        $result->considerAsMatchIfKeyIsNotFound = $considerAsMatchIfKeyIsNotFound;
        $result->mustMatchAllConditions = true;
        return $result;
    }
    public static function hydrate(array $arr) : ContentCategoryDataRelevanceModifier
    {
        $result = DataRelevanceModifier::hydrateBase(new ContentCategoryDataRelevanceModifier(), $arr);
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
    
    /** @deprecated Use MultiplierSelector instead */
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
    
    /** @param ValueCondition[] $conditions new value. */
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
