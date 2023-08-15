<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

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
    /** Creates <inheritdoc cref="T:Relewise.Client.Requests.RelevanceModifiers.VariantSpecificationValueRelevanceModifier" path="/summary">            </inheritdoc> */
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
     * Sets value to a new value.
     * @param string $value new value.
     */
    function setValue(string $value)
    {
        $this->value = $value;
        return $this;
    }
    /**
     * Sets ifIdenticalMultiplyWeightBy to a new value.
     * @param float $ifIdenticalMultiplyWeightBy new value.
     */
    function setIfIdenticalMultiplyWeightBy(float $ifIdenticalMultiplyWeightBy)
    {
        $this->ifIdenticalMultiplyWeightBy = $ifIdenticalMultiplyWeightBy;
        return $this;
    }
    /**
     * Sets ifNotIdenticalMultiplyWeightBy to a new value.
     * @param float $ifNotIdenticalMultiplyWeightBy new value.
     */
    function setIfNotIdenticalMultiplyWeightBy(float $ifNotIdenticalMultiplyWeightBy)
    {
        $this->ifNotIdenticalMultiplyWeightBy = $ifNotIdenticalMultiplyWeightBy;
        return $this;
    }
    /**
     * Sets ifSpecificationKeyNotFoundApplyNotEqualMultiplier to a new value.
     * @param bool $ifSpecificationKeyNotFoundApplyNotEqualMultiplier new value.
     */
    function setIfSpecificationKeyNotFoundApplyNotEqualMultiplier(bool $ifSpecificationKeyNotFoundApplyNotEqualMultiplier)
    {
        $this->ifSpecificationKeyNotFoundApplyNotEqualMultiplier = $ifSpecificationKeyNotFoundApplyNotEqualMultiplier;
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
