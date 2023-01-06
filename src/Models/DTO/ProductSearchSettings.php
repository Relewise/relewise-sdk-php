<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductSearchSettings extends SearchSettings
{
    public string $typeDefinition = "Relewise.Client.Requests.Search.Settings.ProductSearchSettings, Relewise.Client";
    public ?SelectedProductPropertiesSettings $selectedProductProperties;
    public ?SelectedVariantPropertiesSettings $selectedVariantProperties;
    public ?int $explodedVariants;
    public RecommendationSettings $recommendations;
    public ?SelectedBrandPropertiesSettings $selectedBrandProperties;
    public ?VariantSearchSettings $variantSettings;
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
}
