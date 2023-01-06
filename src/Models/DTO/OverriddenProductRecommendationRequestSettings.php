<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class OverriddenProductRecommendationRequestSettings
{
    public ?int $numberOfRecommendations;
    public ?bool $allowFillIfNecessaryToReachNumberOfRecommendations;
    public ?bool $allowReplacingOfRecentlyShownRecommendations;
    public ?bool $recommendVariant;
    public OverriddenSelectedProductPropertiesSettings $selectedProductProperties;
    public OverriddenSelectedVariantPropertiesSettings $selectedVariantProperties;
    public array $custom;
    public ?bool $prioritizeDiversityBetweenRequests;
    public ?bool $allowProductsCurrentlyInCart;
    public OverriddenSelectedBrandPropertiesSettings $selectedBrandProperties;
    public static function create() : OverriddenProductRecommendationRequestSettings
    {
        $result = new OverriddenProductRecommendationRequestSettings();
        return $result;
    }
    public static function hydrate(array $arr) : OverriddenProductRecommendationRequestSettings
    {
        $result = new OverriddenProductRecommendationRequestSettings();
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
            $result->selectedProductProperties = OverriddenSelectedProductPropertiesSettings::hydrate($arr["selectedProductProperties"]);
        }
        if (array_key_exists("selectedVariantProperties", $arr))
        {
            $result->selectedVariantProperties = OverriddenSelectedVariantPropertiesSettings::hydrate($arr["selectedVariantProperties"]);
        }
        if (array_key_exists("custom", $arr))
        {
            $result->custom = array();
            foreach($arr["custom"] as $key => $value)
            {
                $result->custom[$key] = $value;
            }
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
            $result->selectedBrandProperties = OverriddenSelectedBrandPropertiesSettings::hydrate($arr["selectedBrandProperties"]);
        }
        return $result;
    }
    function withNumberOfRecommendations(?int $numberOfRecommendations)
    {
        $this->numberOfRecommendations = $numberOfRecommendations;
        return $this;
    }
    function withAllowFillIfNecessaryToReachNumberOfRecommendations(?bool $allowFillIfNecessaryToReachNumberOfRecommendations)
    {
        $this->allowFillIfNecessaryToReachNumberOfRecommendations = $allowFillIfNecessaryToReachNumberOfRecommendations;
        return $this;
    }
    function withAllowReplacingOfRecentlyShownRecommendations(?bool $allowReplacingOfRecentlyShownRecommendations)
    {
        $this->allowReplacingOfRecentlyShownRecommendations = $allowReplacingOfRecentlyShownRecommendations;
        return $this;
    }
    function withRecommendVariant(?bool $recommendVariant)
    {
        $this->recommendVariant = $recommendVariant;
        return $this;
    }
    function withSelectedProductProperties(OverriddenSelectedProductPropertiesSettings $selectedProductProperties)
    {
        $this->selectedProductProperties = $selectedProductProperties;
        return $this;
    }
    function withSelectedVariantProperties(OverriddenSelectedVariantPropertiesSettings $selectedVariantProperties)
    {
        $this->selectedVariantProperties = $selectedVariantProperties;
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
    function withPrioritizeDiversityBetweenRequests(?bool $prioritizeDiversityBetweenRequests)
    {
        $this->prioritizeDiversityBetweenRequests = $prioritizeDiversityBetweenRequests;
        return $this;
    }
    function withAllowProductsCurrentlyInCart(?bool $allowProductsCurrentlyInCart)
    {
        $this->allowProductsCurrentlyInCart = $allowProductsCurrentlyInCart;
        return $this;
    }
    function withSelectedBrandProperties(OverriddenSelectedBrandPropertiesSettings $selectedBrandProperties)
    {
        $this->selectedBrandProperties = $selectedBrandProperties;
        return $this;
    }
}
