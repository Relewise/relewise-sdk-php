<?php declare(strict_types=1);

namespace Relewise\Models;

/** a RelevanceModifier that can change the relevance of an entity depending on matching conditions on a certain key. */
abstract class DataRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "";
    
    /** The data key that this RelevanceModifier will distinguish on. */
    public string $key;
    /** Specifies whether entities that don't have the specific data Key should be considered a match (true) or not (false). */
    public bool $considerAsMatchIfKeyIsNotFound;
    /** @deprecated Use MultiplierSelector instead */
    public float $multiplyWeightBy;
    /** Specifies whether all Conditions should parse their test on the specific data Key (true) or if only one is required (false). */
    public bool $mustMatchAllConditions;
    /** The conditions that must hold for the specific data Key in order for the entity to be boosted. */
    public array $conditions;
    /** The selector for the multiplier which the entities parsing the Conditions will be have their rank multiplied by. It can either be a FixedDoubleValueSelector taking a fixed value or a DataDoubleSelector that can take the multiplier from a data key containing a double. */
    public ValueSelector $multiplierSelector;
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.RelevanceModifiers.ContentCategoryDataRelevanceModifier, Relewise.Client")
        {
            return ContentCategoryDataRelevanceModifier::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.RelevanceModifiers.ContentDataRelevanceModifier, Relewise.Client")
        {
            return ContentDataRelevanceModifier::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.RelevanceModifiers.ProductCategoryDataRelevanceModifier, Relewise.Client")
        {
            return ProductCategoryDataRelevanceModifier::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.RelevanceModifiers.ProductDataRelevanceModifier, Relewise.Client")
        {
            return ProductDataRelevanceModifier::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.RelevanceModifiers.VariantDataRelevanceModifier, Relewise.Client")
        {
            return VariantDataRelevanceModifier::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = RelevanceModifier::hydrateBase($result, $arr);
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
    
    /** The data key that this RelevanceModifier will distinguish on. */
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    
    /** Specifies whether entities that don't have the specific data Key should be considered a match (true) or not (false). */
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
    
    /** Specifies whether all Conditions should parse their test on the specific data Key (true) or if only one is required (false). */
    function setMustMatchAllConditions(bool $mustMatchAllConditions)
    {
        $this->mustMatchAllConditions = $mustMatchAllConditions;
        return $this;
    }
    
    /** The conditions that must hold for the specific data Key in order for the entity to be boosted. */
    function setConditions(ValueCondition ... $conditions)
    {
        $this->conditions = $conditions;
        return $this;
    }
    
    /**
     * The conditions that must hold for the specific data Key in order for the entity to be boosted.
     * @param ValueCondition[] $conditions new value.
     */
    function setConditionsFromArray(array $conditions)
    {
        $this->conditions = $conditions;
        return $this;
    }
    
    /** The conditions that must hold for the specific data Key in order for the entity to be boosted. */
    function addToConditions(ValueCondition $conditions)
    {
        if (!isset($this->conditions))
        {
            $this->conditions = array();
        }
        array_push($this->conditions, $conditions);
        return $this;
    }
    
    /** The selector for the multiplier which the entities parsing the Conditions will be have their rank multiplied by. It can either be a FixedDoubleValueSelector taking a fixed value or a DataDoubleSelector that can take the multiplier from a data key containing a double. */
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
