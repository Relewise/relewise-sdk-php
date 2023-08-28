<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** a RelevanceModifier that can change the relevance of a variant depending on matching conditions on a certain key. */
class VariantDataRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.VariantDataRelevanceModifier, Relewise.Client";
    public string $key;
    /** Specifies whether variants that don't have the specific data Key should be considered a match () or not (). */
    public bool $considerAsMatchIfKeyIsNotFound;
    /** @deprecated Use MultiplierSelector instead */
    public float $multiplyWeightBy;
    public bool $mustMatchAllConditions;
    /** The conditions that must hold for the specific data Key in order for the variant to be boosted. */
    public array $conditions;
    /** The selector for the multiplier which the variants parsing the Conditions will be have their rank multiplied by. It can either be a FixedDoubleValueSelector taking a fixed value or a DataDoubleSelector that can take the multiplier from a data key containing a double. */
    public ValueSelector $multiplierSelector;
    public static function create(string $key, array $conditions, ValueSelector $multiplierSelector, bool $mustMatchAllConditions = true, bool $considerAsMatchIfKeyIsNotFound = false) : VariantDataRelevanceModifier
    {
        $result = new VariantDataRelevanceModifier();
        $result->key = $key;
        $result->conditions = $conditions;
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
    /** Specifies whether variants that don't have the specific data Key should be considered a match () or not (). */
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
    /** The conditions that must hold for the specific data Key in order for the variant to be boosted. */
    function setConditions(ValueCondition ... $conditions)
    {
        $this->conditions = $conditions;
        return $this;
    }
    /**
     * The conditions that must hold for the specific data Key in order for the variant to be boosted.
     * @param ValueCondition[] $conditions new value.
     */
    function setConditionsFromArray(array $conditions)
    {
        $this->conditions = $conditions;
        return $this;
    }
    /** The conditions that must hold for the specific data Key in order for the variant to be boosted. */
    function addToConditions(ValueCondition $conditions)
    {
        if (!isset($this->conditions))
        {
            $this->conditions = array();
        }
        array_push($this->conditions, $conditions);
        return $this;
    }
    /** The selector for the multiplier which the variants parsing the Conditions will be have their rank multiplied by. It can either be a FixedDoubleValueSelector taking a fixed value or a DataDoubleSelector that can take the multiplier from a data key containing a double. */
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
