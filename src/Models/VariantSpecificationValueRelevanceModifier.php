<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** a <see cref="T:Relewise.Client.Requests.RelevanceModifiers.RelevanceModifier"> that can change the relevance of a Variant depending on whether a certain specification <see cref="P:Relewise.Client.Requests.RelevanceModifiers.VariantSpecificationValueRelevanceModifier.Key"> has a certain <see cref="P:Relewise.Client.Requests.RelevanceModifiers.VariantSpecificationValueRelevanceModifier.Value">.            </see></see></see> */
class VariantSpecificationValueRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.VariantSpecificationValueRelevanceModifier, Relewise.Client";
    /** The specification key that this <see cref="T:Relewise.Client.Requests.RelevanceModifiers.RelevanceModifier"> will distinguish on.            </see> */
    public string $key;
    /** The value that the key must be equal. */
    public string $value;
    /** The weight that this <see cref="T:Relewise.Client.Requests.RelevanceModifiers.RelevanceModifier"> will multiply relevant variants with.            </see> */
    public float $ifIdenticalMultiplyWeightBy;
    /** The weight that this <see cref="T:Relewise.Client.Requests.RelevanceModifiers.RelevanceModifier"> will multiply variants that are note relevant with.            </see> */
    public float $ifNotIdenticalMultiplyWeightBy;
    /** Determines whether specification keys that are not found should count as the value not being equal i.e. multiplying by <see cref="P:Relewise.Client.Requests.RelevanceModifiers.VariantSpecificationValueRelevanceModifier.IfNotIdenticalMultiplyWeightBy">. Alternatively the rank will not be modified in any way by this modifier.            </see> */
    public bool $ifSpecificationKeyNotFoundApplyNotEqualMultiplier;
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
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    function setValue(string $value)
    {
        $this->value = $value;
        return $this;
    }
    function setIfIdenticalMultiplyWeightBy(float $ifIdenticalMultiplyWeightBy)
    {
        $this->ifIdenticalMultiplyWeightBy = $ifIdenticalMultiplyWeightBy;
        return $this;
    }
    function setIfNotIdenticalMultiplyWeightBy(float $ifNotIdenticalMultiplyWeightBy)
    {
        $this->ifNotIdenticalMultiplyWeightBy = $ifNotIdenticalMultiplyWeightBy;
        return $this;
    }
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
