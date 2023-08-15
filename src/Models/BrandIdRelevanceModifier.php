<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** a RelevanceModifier that can change the relevance of a Product depending on a BrandId. */
class BrandIdRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.BrandIdRelevanceModifier, Relewise.Client";
    /** The Id of the Brand that this RelevanceModifier will distinguish on. */
    public string $brandId;
    /** The weight that the Product will be multiplied with if it matches the specific BrandId. */
    public float $ifProductIsBrandMultiplyWeightBy;
    /** The weight that the Product will be multiplied with if it does not match the specific BrandId. */
    public float $ifProductIsNotBrandMultiplyWeightBy;
    /** Creates <inheritdoc cref="T:Relewise.Client.Requests.RelevanceModifiers.BrandIdRelevanceModifier">            </inheritdoc> */
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
    /**
     * Sets brandId to a new value.
     * @param string $brandId new value.
     */
    function setBrandId(string $brandId)
    {
        $this->brandId = $brandId;
        return $this;
    }
    /**
     * Sets ifProductIsBrandMultiplyWeightBy to a new value.
     * @param float $ifProductIsBrandMultiplyWeightBy new value.
     */
    function setIfProductIsBrandMultiplyWeightBy(float $ifProductIsBrandMultiplyWeightBy)
    {
        $this->ifProductIsBrandMultiplyWeightBy = $ifProductIsBrandMultiplyWeightBy;
        return $this;
    }
    /**
     * Sets ifProductIsNotBrandMultiplyWeightBy to a new value.
     * @param float $ifProductIsNotBrandMultiplyWeightBy new value.
     */
    function setIfProductIsNotBrandMultiplyWeightBy(float $ifProductIsNotBrandMultiplyWeightBy)
    {
        $this->ifProductIsNotBrandMultiplyWeightBy = $ifProductIsNotBrandMultiplyWeightBy;
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
