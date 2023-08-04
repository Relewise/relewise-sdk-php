<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** a <see cref="T:Relewise.Client.Requests.RelevanceModifiers.RelevanceModifier"> that can change the relevance of a Product depending on matching conditions on a certain key.            </see> */
class ProductDataRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.ProductDataRelevanceModifier, Relewise.Client";
    /** The data key that this <see cref="T:Relewise.Client.Requests.RelevanceModifiers.RelevanceModifier"> will distinguish on.            </see> */
    public string $key;
    /** Specifies whether products that don't have the specific data <see cref="P:Relewise.Client.Requests.RelevanceModifiers.ProductDataRelevanceModifier.Key"> should be considered a match (<see langword="true">) or not (<see langword="false">).            </see></see></see> */
    public bool $considerAsMatchIfKeyIsNotFound;
    public float $multiplyWeightBy;
    /** Specifies whether all <see cref="P:Relewise.Client.Requests.RelevanceModifiers.ProductDataRelevanceModifier.Conditions"> should parse their test on the specific data <see cref="P:Relewise.Client.Requests.RelevanceModifiers.ProductDataRelevanceModifier.Key"> (<see langword="true">) or if only one is required (<see langword="false">).            </see></see></see></see> */
    public bool $mustMatchAllConditions;
    /** The conditions that must hold for the specific data <see cref="P:Relewise.Client.Requests.RelevanceModifiers.ProductDataRelevanceModifier.Key"> in order for the product to be boosted.            </see> */
    public array $conditions;
    /** The selector for the multiplier which the products parsing the <see cref="P:Relewise.Client.Requests.RelevanceModifiers.ProductDataRelevanceModifier.Conditions"> will be have their rank multiplied by. It can either be a <see cref="T:Relewise.Client.Requests.ValueSelectors.FixedDoubleValueSelector"> taking a fixed value or a <see cref="T:Relewise.Client.Requests.ValueSelectors.DataDoubleSelector"> that can take the multiplier from a data key containing a double.            </see></see></see> */
    public ValueSelector $multiplierSelector;
    public static function create(string $key, ValueSelector $multiplierSelector, bool $considerAsMatchIfKeyIsNotFound = false) : ProductDataRelevanceModifier
    {
        $result = new ProductDataRelevanceModifier();
        $result->key = $key;
        $result->multiplierSelector = $multiplierSelector;
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
