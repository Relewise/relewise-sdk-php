<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class BrandIdRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.BrandIdRelevanceModifier, Relewise.Client";
    public string $brandId;
    public float $ifProductIsBrandMultiplyWeightBy;
    public float $ifProductIsNotBrandMultiplyWeightBy;
    public static function create(string $brandId, float $ifProductIsBrandMultiplyWeightBy = 1, float $ifProductIsNotBrandMultiplyWeightBy = 1) : BrandIdRelevanceModifier
    {
        $result = new BrandIdRelevanceModifier();
        $result->brandId = $brandId;
        $result->ifProductIsBrandMultiplyWeightBy = $ifProductIsBrandMultiplyWeightBy;
        $result->ifProductIsNotBrandMultiplyWeightBy = $ifProductIsNotBrandMultiplyWeightBy;
        return $result;
    }
    public static function hydrate(array $arr) : BrandIdRelevanceModifier
    {
        $result = RelevanceModifier::hydrateBase(new BrandIdRelevanceModifier(), $arr);
        if (array_key_exists("brandId", $arr))
        {
            $result->brandId = $arr["brandId"];
        }
        if (array_key_exists("ifProductIsBrandMultiplyWeightBy", $arr))
        {
            $result->ifProductIsBrandMultiplyWeightBy = $arr["ifProductIsBrandMultiplyWeightBy"];
        }
        if (array_key_exists("ifProductIsNotBrandMultiplyWeightBy", $arr))
        {
            $result->ifProductIsNotBrandMultiplyWeightBy = $arr["ifProductIsNotBrandMultiplyWeightBy"];
        }
        return $result;
    }
    function withBrandId(string $brandId)
    {
        $this->brandId = $brandId;
        return $this;
    }
    function withIfProductIsBrandMultiplyWeightBy(float $ifProductIsBrandMultiplyWeightBy)
    {
        $this->ifProductIsBrandMultiplyWeightBy = $ifProductIsBrandMultiplyWeightBy;
        return $this;
    }
    function withIfProductIsNotBrandMultiplyWeightBy(float $ifProductIsNotBrandMultiplyWeightBy)
    {
        $this->ifProductIsNotBrandMultiplyWeightBy = $ifProductIsNotBrandMultiplyWeightBy;
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
