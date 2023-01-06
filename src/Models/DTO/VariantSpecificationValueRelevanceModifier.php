<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

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
    function withKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    function withValue(string $value)
    {
        $this->value = $value;
        return $this;
    }
    function withIfIdenticalMultiplyWeightBy(float $ifIdenticalMultiplyWeightBy)
    {
        $this->ifIdenticalMultiplyWeightBy = $ifIdenticalMultiplyWeightBy;
        return $this;
    }
    function withIfNotIdenticalMultiplyWeightBy(float $ifNotIdenticalMultiplyWeightBy)
    {
        $this->ifNotIdenticalMultiplyWeightBy = $ifNotIdenticalMultiplyWeightBy;
        return $this;
    }
    function withIfSpecificationKeyNotFoundApplyNotEqualMultiplier(bool $ifSpecificationKeyNotFoundApplyNotEqualMultiplier)
    {
        $this->ifSpecificationKeyNotFoundApplyNotEqualMultiplier = $ifSpecificationKeyNotFoundApplyNotEqualMultiplier;
        return $this;
    }
    function withFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    function withCustom(string $key, string $value)
    {
        if (!isset($this->custom))
        {
            $this->custom = array();
        }
        $this->custom[$key] = $value;
        return $this;
    }
}