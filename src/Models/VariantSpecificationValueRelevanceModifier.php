<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class VariantSpecificationValueRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.VariantSpecificationValueRelevanceModifier, Relewise.Client";
    public string $key;
    public string $value;
    public float $ifIdenticalMultiplyWeightBy;
    public float $ifNotIdenticalMultiplyWeightBy;
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
