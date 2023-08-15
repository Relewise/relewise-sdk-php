<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** a RelevanceModifier that can change the relevance of a Product depending on matching conditions on a certain key. */
class ProductDataRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.ProductDataRelevanceModifier, Relewise.Client";
    /** The data key that this RelevanceModifier will distinguish on. */
    public string $key;
    /** Specifies whether products that don't have the specific data Key should be considered a match () or not (). */
    public bool $considerAsMatchIfKeyIsNotFound;
    public float $multiplyWeightBy;
    /** Specifies whether all Conditions should parse their test on the specific data Key () or if only one is required (). */
    public bool $mustMatchAllConditions;
    /** The conditions that must hold for the specific data Key in order for the product to be boosted. */
    public array $conditions;
    /** The selector for the multiplier which the products parsing the Conditions will be have their rank multiplied by. It can either be a FixedDoubleValueSelector taking a fixed value or a DataDoubleSelector that can take the multiplier from a data key containing a double. */
    public ValueSelector $multiplierSelector;
    /** Creates <inheritdoc cref="T:Relewise.Client.Requests.RelevanceModifiers.ProductDataRelevanceModifier" path="/summary">            </inheritdoc> */
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
        $result = RelevanceModifier::hydrateBase(new ProductDataRelevanceModifier(), $arr);
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
     * Sets considerAsMatchIfKeyIsNotFound to a new value.
     * @param bool $considerAsMatchIfKeyIsNotFound new value.
     */
    function setConsiderAsMatchIfKeyIsNotFound(bool $considerAsMatchIfKeyIsNotFound)
    {
        $this->considerAsMatchIfKeyIsNotFound = $considerAsMatchIfKeyIsNotFound;
        return $this;
    }
    /**
     * Sets multiplyWeightBy to a new value.
     * @param float $multiplyWeightBy new value.
     */
    function setMultiplyWeightBy(float $multiplyWeightBy)
    {
        $this->multiplyWeightBy = $multiplyWeightBy;
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
     * @param ValueCondition[] $conditions new value.
     */
    function setConditions(ValueCondition ... $conditions)
    {
        $this->conditions = $conditions;
        return $this;
    }
    /**
     * Sets conditions to a new value from an array.
     * @param ValueCondition[] $conditions new value.
     */
    function setConditionsFromArray(array $conditions)
    {
        $this->conditions = $conditions;
        return $this;
    }
    /**
     * Adds a new element to conditions.
     * @param ValueCondition $conditions new element.
     */
    function addToConditions(ValueCondition $conditions)
    {
        if (!isset($this->conditions))
        {
            $this->conditions = array();
        }
        array_push($this->conditions, $conditions);
        return $this;
    }
    /**
     * Sets multiplierSelector to a new value.
     * @param ValueSelector $multiplierSelector new value.
     */
    function setMultiplierSelector(ValueSelector $multiplierSelector)
    {
        $this->multiplierSelector = $multiplierSelector;
        return $this;
    }
    /**
     * Sets filters to a new value.
     * @param FilterCollection $filters new value.
     */
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
}
