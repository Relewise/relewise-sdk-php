<?php declare(strict_types=1);

namespace Relewise\Models;

/** a RelevanceModifier that can change the relevance of a Variant depending on whether a certain specification Key has a certain Value. */
class VariantSpecificationValueRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.VariantSpecificationValueRelevanceModifier, Relewise.Client";
    /** The specification key that this RelevanceModifier will distinguish on. */
    public string $key;
    /** The value that the key must be equal. */
    public string $value;
    /** The weight that this RelevanceModifier will multiply relevant variants with. */
    public float $ifIdenticalMultiplyWeightBy;
    /** The weight that this RelevanceModifier will multiply variants that are note relevant with. */
    public float $ifNotIdenticalMultiplyWeightBy;
    /** Determines whether specification keys that are not found should count as the value not being equal i.e. multiplying by IfNotIdenticalMultiplyWeightBy. Alternatively the rank will not be modified in any way by this modifier. */
    public bool $ifSpecificationKeyNotFoundApplyNotEqualMultiplier;
    /**
     * Creates a RelevanceModifier that can change the relevance of a Variant depending on whether a certain specification Key has a certain Value.
     * @param string $key The specification key that this RelevanceModifier will distinguish on.
     * @param string $value The value that the key must be equal.
     * @param float $ifIdenticalMultiplyWeightBy The weight that this RelevanceModifier will multiply relevant variants with.
     * @param float $ifNotIdenticalMultiplyWeightBy The weight that this RelevanceModifier will multiply variants that are note relevant with.
     * @param bool $ifSpecificationKeyNotFoundApplyNotEqualMultiplier Determines whether specification keys that are not found should count as the value not being equal i.e. multiplying by IfNotIdenticalMultiplyWeightBy. Alternatively the rank will not be modified in any way by this modifier.
     */
    public static function create(string $key, string $value, float $ifIdenticalMultiplyWeightBy = 1, float $ifNotIdenticalMultiplyWeightBy = 0, bool $ifSpecificationKeyNotFoundApplyNotEqualMultiplier = false) : VariantSpecificationValueRelevanceModifier
    {
        $result = new VariantSpecificationValueRelevanceModifier();
        $result->key = $key;
        $result->value = $value;
        $result->ifIdenticalMultiplyWeightBy = $ifIdenticalMultiplyWeightBy;
        $result->ifNotIdenticalMultiplyWeightBy = $ifNotIdenticalMultiplyWeightBy;
        $result->ifSpecificationKeyNotFoundApplyNotEqualMultiplier = $ifSpecificationKeyNotFoundApplyNotEqualMultiplier;
        return $result;
    }
    public static function hydrate(array $arr) : VariantSpecificationValueRelevanceModifier
    {
        $result = RelevanceModifier::hydrateBase(new VariantSpecificationValueRelevanceModifier(), $arr);
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        if (array_key_exists("value", $arr))
        {
            $result->value = $arr["value"];
        }
        if (array_key_exists("ifIdenticalMultiplyWeightBy", $arr))
        {
            $result->ifIdenticalMultiplyWeightBy = $arr["ifIdenticalMultiplyWeightBy"];
        }
        if (array_key_exists("ifNotIdenticalMultiplyWeightBy", $arr))
        {
            $result->ifNotIdenticalMultiplyWeightBy = $arr["ifNotIdenticalMultiplyWeightBy"];
        }
        if (array_key_exists("ifSpecificationKeyNotFoundApplyNotEqualMultiplier", $arr))
        {
            $result->ifSpecificationKeyNotFoundApplyNotEqualMultiplier = $arr["ifSpecificationKeyNotFoundApplyNotEqualMultiplier"];
        }
        return $result;
    }
    /** The specification key that this RelevanceModifier will distinguish on. */
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    /** The value that the key must be equal. */
    function setValue(string $value)
    {
        $this->value = $value;
        return $this;
    }
    /** The weight that this RelevanceModifier will multiply relevant variants with. */
    function setIfIdenticalMultiplyWeightBy(float $ifIdenticalMultiplyWeightBy)
    {
        $this->ifIdenticalMultiplyWeightBy = $ifIdenticalMultiplyWeightBy;
        return $this;
    }
    /** The weight that this RelevanceModifier will multiply variants that are note relevant with. */
    function setIfNotIdenticalMultiplyWeightBy(float $ifNotIdenticalMultiplyWeightBy)
    {
        $this->ifNotIdenticalMultiplyWeightBy = $ifNotIdenticalMultiplyWeightBy;
        return $this;
    }
    /** Determines whether specification keys that are not found should count as the value not being equal i.e. multiplying by IfNotIdenticalMultiplyWeightBy. Alternatively the rank will not be modified in any way by this modifier. */
    function setIfSpecificationKeyNotFoundApplyNotEqualMultiplier(bool $ifSpecificationKeyNotFoundApplyNotEqualMultiplier)
    {
        $this->ifSpecificationKeyNotFoundApplyNotEqualMultiplier = $ifSpecificationKeyNotFoundApplyNotEqualMultiplier;
        return $this;
    }
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
}
