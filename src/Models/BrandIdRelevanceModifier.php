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
    /**
     * Creates a RelevanceModifier that can change the relevance of a Product depending on a BrandId.
     * @param string $brandId The Id of the Brand that this RelevanceModifier will distinguish on.
     * @param float $ifProductIsBrandMultiplyWeightBy The weight that the Product will be multiplied with if it matches the specific BrandId.
     * @param float $ifProductIsNotBrandMultiplyWeightBy The weight that the Product will be multiplied with if it does not match the specific BrandId.
     */
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
    /** The Id of the Brand that this RelevanceModifier will distinguish on. */
    function setBrandId(string $brandId)
    {
        $this->brandId = $brandId;
        return $this;
    }
    /** The weight that the Product will be multiplied with if it matches the specific BrandId. */
    function setIfProductIsBrandMultiplyWeightBy(float $ifProductIsBrandMultiplyWeightBy)
    {
        $this->ifProductIsBrandMultiplyWeightBy = $ifProductIsBrandMultiplyWeightBy;
        return $this;
    }
    /** The weight that the Product will be multiplied with if it does not match the specific BrandId. */
    function setIfProductIsNotBrandMultiplyWeightBy(float $ifProductIsNotBrandMultiplyWeightBy)
    {
        $this->ifProductIsNotBrandMultiplyWeightBy = $ifProductIsNotBrandMultiplyWeightBy;
        return $this;
    }
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
}
