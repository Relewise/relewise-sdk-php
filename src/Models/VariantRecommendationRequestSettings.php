<?php declare(strict_types=1);

namespace Relewise\Models;

/** Recommendation-specific variant controls for product recommendation requests. */
class VariantRecommendationRequestSettings extends VariantRequestSettings
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.VariantRecommendationRequestSettings, Relewise.Client";
    public static function create() : VariantRecommendationRequestSettings
    {
        $result = new VariantRecommendationRequestSettings();
        return $result;
    }
    
    public static function hydrate(array $arr) : VariantRecommendationRequestSettings
    {
        $result = VariantRequestSettings::hydrateBase(new VariantRecommendationRequestSettings(), $arr);
        return $result;
    }
    
    function setMaxVariantsPerProduct(?int $maxVariantsPerProduct)
    {
        $this->maxVariantsPerProduct = $maxVariantsPerProduct;
        return $this;
    }
    
    function setSorting(?VariantSorting $sorting)
    {
        $this->sorting = $sorting;
        return $this;
    }
}
