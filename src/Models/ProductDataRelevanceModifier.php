<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** a RelevanceModifier that can change the relevance of a Product depending on matching conditions on a certain key. */
class ProductDataRelevanceModifier extends DataRelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.ProductDataRelevanceModifier, Relewise.Client";
    /**
     * Creates a RelevanceModifier that can change the relevance of a Product depending on matching conditions on a certain key.
     * @param string $key The data key that this RelevanceModifier will distinguish on.
     * @param ValueCondition[] $conditions The selector for the multiplier which the entities parsing the Conditions will be have their rank multiplied by. It can either be a FixedDoubleValueSelector taking a fixed value or a DataDoubleSelector that can take the multiplier from a data key containing a double.   Specifies whether all Conditions should parse their test on the specific data Key (true) or if only one is required (false).   Specifies whether entities that don't have the specific data Key should be considered a match (true) or not (false).
     */
    public static function create(string $key, array $conditions, ValueSelector $multiplierSelector, bool $mustMatchAllConditions = true, bool $considerAsMatchIfKeyIsNotFound = false) : ProductDataRelevanceModifier
    {
        $result = new ProductDataRelevanceModifier();
        $result->key = $key;
        $result->conditions = $conditions;
        $result->multiplierSelector = $multiplierSelector;
        $result->mustMatchAllConditions = $mustMatchAllConditions;
        $result->considerAsMatchIfKeyIsNotFound = $considerAsMatchIfKeyIsNotFound;
        $result->mustMatchAllConditions = true;
        return $result;
    }
    public static function hydrate(array $arr) : ProductDataRelevanceModifier
    {
        $result = DataRelevanceModifier::hydrateBase(new ProductDataRelevanceModifier(), $arr);
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
