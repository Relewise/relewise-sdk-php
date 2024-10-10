<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductSearchSettings extends SearchSettings
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Settings.ProductSearchSettings, Relewise.Client";
    
    public ?SelectedProductPropertiesSettings $selectedProductProperties;
    
    public ?SelectedVariantPropertiesSettings $selectedVariantProperties;
    
    public ?int $explodedVariants;
    
    /** @deprecated Not currently in use */
    public RecommendationSettings $recommendations;
    
    public ?SelectedBrandPropertiesSettings $selectedBrandProperties;
    
    public ?VariantSearchSettings $variantSettings;
    
    /** Used to define constraints which must be honoured to be a valid results. The difference between this and Filters, is that filters are evaluated per product and variant, constraints could be acting on the result of such filter evaluations or a combination of factors, such as whether the product has any variants which matched the provided filters etc. */
    public ?ProductSearchResultConstraint $resultConstraint;
    
    public static function create() : ProductSearchSettings
    {
        $result = new ProductSearchSettings();
        return $result;
    }
    
    public static function hydrate(array $arr) : ProductSearchSettings
    {
        $result = SearchSettings::hydrateBase(new ProductSearchSettings(), $arr);
        if (array_key_exists("selectedProductProperties", $arr))
        {
            $result->selectedProductProperties = SelectedProductPropertiesSettings::hydrate($arr["selectedProductProperties"]);
        }
        if (array_key_exists("selectedVariantProperties", $arr))
        {
            $result->selectedVariantProperties = SelectedVariantPropertiesSettings::hydrate($arr["selectedVariantProperties"]);
        }
        if (array_key_exists("explodedVariants", $arr))
        {
            $result->explodedVariants = $arr["explodedVariants"];
        }
        if (array_key_exists("recommendations", $arr))
        {
            $result->recommendations = RecommendationSettings::hydrate($arr["recommendations"]);
        }
        if (array_key_exists("selectedBrandProperties", $arr))
        {
            $result->selectedBrandProperties = SelectedBrandPropertiesSettings::hydrate($arr["selectedBrandProperties"]);
        }
        if (array_key_exists("variantSettings", $arr))
        {
            $result->variantSettings = VariantSearchSettings::hydrate($arr["variantSettings"]);
        }
        if (array_key_exists("resultConstraint", $arr))
        {
            $result->resultConstraint = ProductSearchResultConstraint::hydrate($arr["resultConstraint"]);
        }
        return $result;
    }
    
    function setSelectedProductProperties(?SelectedProductPropertiesSettings $selectedProductProperties)
    {
        $this->selectedProductProperties = $selectedProductProperties;
        return $this;
    }
    
    function setSelectedVariantProperties(?SelectedVariantPropertiesSettings $selectedVariantProperties)
    {
        $this->selectedVariantProperties = $selectedVariantProperties;
        return $this;
    }
    
    function setExplodedVariants(?int $explodedVariants)
    {
        $this->explodedVariants = $explodedVariants;
        return $this;
    }
    
    /** @deprecated Not currently in use */
    function setRecommendations(RecommendationSettings $recommendations)
    {
        $this->recommendations = $recommendations;
        return $this;
    }
    
    function setSelectedBrandProperties(?SelectedBrandPropertiesSettings $selectedBrandProperties)
    {
        $this->selectedBrandProperties = $selectedBrandProperties;
        return $this;
    }
    
    function setVariantSettings(?VariantSearchSettings $variantSettings)
    {
        $this->variantSettings = $variantSettings;
        return $this;
    }
    
    /** Used to define constraints which must be honoured to be a valid results. The difference between this and Filters, is that filters are evaluated per product and variant, constraints could be acting on the result of such filter evaluations or a combination of factors, such as whether the product has any variants which matched the provided filters etc. */
    function setResultConstraint(?ProductSearchResultConstraint $resultConstraint)
    {
        $this->resultConstraint = $resultConstraint;
        return $this;
    }
}
