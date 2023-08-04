<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

/** a <see cref="T:Relewise.Client.Requests.RelevanceModifiers.RelevanceModifier"> that can change the relevance of a Product depending on a <see cref="P:Relewise.Client.Requests.RelevanceModifiers.BrandIdRelevanceModifier.BrandId">.            </see></see> */
class BrandIdRelevanceModifier extends RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.BrandIdRelevanceModifier, Relewise.Client";
    /** The Id of the Brand that this <see cref="T:Relewise.Client.Requests.RelevanceModifiers.RelevanceModifier"> will distinguish on.            </see> */
    public string $brandId;
    /** The weight that the Product will be multiplied with if it matches the specific <see cref="P:Relewise.Client.Requests.RelevanceModifiers.BrandIdRelevanceModifier.BrandId">.            </see> */
    public float $ifProductIsBrandMultiplyWeightBy;
    /** The weight that the Product will be multiplied with if it does not match the specific <see cref="P:Relewise.Client.Requests.RelevanceModifiers.BrandIdRelevanceModifier.BrandId">.            </see> */
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
    function setBrandId(string $brandId)
    {
        $this->brandId = $brandId;
        return $this;
    }
    function setIfProductIsBrandMultiplyWeightBy(float $ifProductIsBrandMultiplyWeightBy)
    {
        $this->ifProductIsBrandMultiplyWeightBy = $ifProductIsBrandMultiplyWeightBy;
        return $this;
    }
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
