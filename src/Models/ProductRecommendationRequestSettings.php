<?php declare(strict_types=1);

namespace Relewise\Models;

class ProductRecommendationRequestSettings
{
    public int $numberOfRecommendations;
    public bool $allowFillIfNecessaryToReachNumberOfRecommendations;
    public bool $allowReplacingOfRecentlyShownRecommendations;
    public bool $recommendVariant;
    public ?SelectedProductPropertiesSettings $selectedProductProperties;
    public ?SelectedVariantPropertiesSettings $selectedVariantProperties;
    public bool $prioritizeDiversityBetweenRequests;
    public ?bool $allowProductsCurrentlyInCart;
    public ?SelectedBrandPropertiesSettings $selectedBrandProperties;
    public ?int $prioritizeResultsNotRecommendedWithinSeconds;
    public static function create() : ProductRecommendationRequestSettings
    {
        $result = new ProductRecommendationRequestSettings();
        return $result;
    }
    public static function hydrate(array $arr) : ProductRecommendationRequestSettings
    {
        $result = new ProductRecommendationRequestSettings();
        if (array_key_exists("numberOfRecommendations", $arr))
        {
            $result->numberOfRecommendations = $arr["numberOfRecommendations"];
        }
        if (array_key_exists("allowFillIfNecessaryToReachNumberOfRecommendations", $arr))
        {
            $result->allowFillIfNecessaryToReachNumberOfRecommendations = $arr["allowFillIfNecessaryToReachNumberOfRecommendations"];
        }
        if (array_key_exists("allowReplacingOfRecentlyShownRecommendations", $arr))
        {
            $result->allowReplacingOfRecentlyShownRecommendations = $arr["allowReplacingOfRecentlyShownRecommendations"];
        }
        if (array_key_exists("recommendVariant", $arr))
        {
            $result->recommendVariant = $arr["recommendVariant"];
        }
        if (array_key_exists("selectedProductProperties", $arr))
        {
            $result->selectedProductProperties = SelectedProductPropertiesSettings::hydrate($arr["selectedProductProperties"]);
        }
        if (array_key_exists("selectedVariantProperties", $arr))
        {
            $result->selectedVariantProperties = SelectedVariantPropertiesSettings::hydrate($arr["selectedVariantProperties"]);
        }
        if (array_key_exists("prioritizeDiversityBetweenRequests", $arr))
        {
            $result->prioritizeDiversityBetweenRequests = $arr["prioritizeDiversityBetweenRequests"];
        }
        if (array_key_exists("allowProductsCurrentlyInCart", $arr))
        {
            $result->allowProductsCurrentlyInCart = $arr["allowProductsCurrentlyInCart"];
        }
        if (array_key_exists("selectedBrandProperties", $arr))
        {
            $result->selectedBrandProperties = SelectedBrandPropertiesSettings::hydrate($arr["selectedBrandProperties"]);
        }
        if (array_key_exists("prioritizeResultsNotRecommendedWithinSeconds", $arr))
        {
            $result->prioritizeResultsNotRecommendedWithinSeconds = $arr["prioritizeResultsNotRecommendedWithinSeconds"];
        }
        return $result;
    }
    
    function setNumberOfRecommendations(int $numberOfRecommendations)
    {
        $this->numberOfRecommendations = $numberOfRecommendations;
        return $this;
    }
    
    function setAllowFillIfNecessaryToReachNumberOfRecommendations(bool $allowFillIfNecessaryToReachNumberOfRecommendations)
    {
        $this->allowFillIfNecessaryToReachNumberOfRecommendations = $allowFillIfNecessaryToReachNumberOfRecommendations;
        return $this;
    }
    
    function setAllowReplacingOfRecentlyShownRecommendations(bool $allowReplacingOfRecentlyShownRecommendations)
    {
        $this->allowReplacingOfRecentlyShownRecommendations = $allowReplacingOfRecentlyShownRecommendations;
        return $this;
    }
    
    function setRecommendVariant(bool $recommendVariant)
    {
        $this->recommendVariant = $recommendVariant;
        return $this;
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
    
    function setPrioritizeDiversityBetweenRequests(bool $prioritizeDiversityBetweenRequests)
    {
        $this->prioritizeDiversityBetweenRequests = $prioritizeDiversityBetweenRequests;
        return $this;
    }
    
    function setAllowProductsCurrentlyInCart(?bool $allowProductsCurrentlyInCart)
    {
        $this->allowProductsCurrentlyInCart = $allowProductsCurrentlyInCart;
        return $this;
    }
    
    function setSelectedBrandProperties(?SelectedBrandPropertiesSettings $selectedBrandProperties)
    {
        $this->selectedBrandProperties = $selectedBrandProperties;
        return $this;
    }
    
    function setPrioritizeResultsNotRecommendedWithinSeconds(?int $prioritizeResultsNotRecommendedWithinSeconds)
    {
        $this->prioritizeResultsNotRecommendedWithinSeconds = $prioritizeResultsNotRecommendedWithinSeconds;
        return $this;
    }
}
