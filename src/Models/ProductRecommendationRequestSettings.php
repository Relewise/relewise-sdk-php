<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ProductRecommendationRequestSettings
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.ProductRecommendationRequestSettings, Relewise.Client";
    public int $numberOfRecommendations;
    public bool $allowFillIfNecessaryToReachNumberOfRecommendations;
    public bool $allowReplacingOfRecentlyShownRecommendations;
    public bool $recommendVariant;
    public ?SelectedProductPropertiesSettings $selectedProductProperties;
    public ?SelectedVariantPropertiesSettings $selectedVariantProperties;
    public bool $prioritizeDiversityBetweenRequests;
    public ?bool $allowProductsCurrentlyInCart;
    public ?SelectedBrandPropertiesSettings $selectedBrandProperties;
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
        return $result;
    }
    /**
     * Sets numberOfRecommendations to a new value.
     * @param int $numberOfRecommendations new value.
     */
    function setNumberOfRecommendations(int $numberOfRecommendations)
    {
        $this->numberOfRecommendations = $numberOfRecommendations;
        return $this;
    }
    /**
     * Sets allowFillIfNecessaryToReachNumberOfRecommendations to a new value.
     * @param bool $allowFillIfNecessaryToReachNumberOfRecommendations new value.
     */
    function setAllowFillIfNecessaryToReachNumberOfRecommendations(bool $allowFillIfNecessaryToReachNumberOfRecommendations)
    {
        $this->allowFillIfNecessaryToReachNumberOfRecommendations = $allowFillIfNecessaryToReachNumberOfRecommendations;
        return $this;
    }
    /**
     * Sets allowReplacingOfRecentlyShownRecommendations to a new value.
     * @param bool $allowReplacingOfRecentlyShownRecommendations new value.
     */
    function setAllowReplacingOfRecentlyShownRecommendations(bool $allowReplacingOfRecentlyShownRecommendations)
    {
        $this->allowReplacingOfRecentlyShownRecommendations = $allowReplacingOfRecentlyShownRecommendations;
        return $this;
    }
    /**
     * Sets recommendVariant to a new value.
     * @param bool $recommendVariant new value.
     */
    function setRecommendVariant(bool $recommendVariant)
    {
        $this->recommendVariant = $recommendVariant;
        return $this;
    }
    /**
     * Sets selectedProductProperties to a new value.
     * @param ?SelectedProductPropertiesSettings $selectedProductProperties new value.
     */
    function setSelectedProductProperties(?SelectedProductPropertiesSettings $selectedProductProperties)
    {
        $this->selectedProductProperties = $selectedProductProperties;
        return $this;
    }
    /**
     * Sets selectedVariantProperties to a new value.
     * @param ?SelectedVariantPropertiesSettings $selectedVariantProperties new value.
     */
    function setSelectedVariantProperties(?SelectedVariantPropertiesSettings $selectedVariantProperties)
    {
        $this->selectedVariantProperties = $selectedVariantProperties;
        return $this;
    }
    /**
     * Sets prioritizeDiversityBetweenRequests to a new value.
     * @param bool $prioritizeDiversityBetweenRequests new value.
     */
    function setPrioritizeDiversityBetweenRequests(bool $prioritizeDiversityBetweenRequests)
    {
        $this->prioritizeDiversityBetweenRequests = $prioritizeDiversityBetweenRequests;
        return $this;
    }
    /**
     * Sets allowProductsCurrentlyInCart to a new value.
     * @param ?bool $allowProductsCurrentlyInCart new value.
     */
    function setAllowProductsCurrentlyInCart(?bool $allowProductsCurrentlyInCart)
    {
        $this->allowProductsCurrentlyInCart = $allowProductsCurrentlyInCart;
        return $this;
    }
    /**
     * Sets selectedBrandProperties to a new value.
     * @param ?SelectedBrandPropertiesSettings $selectedBrandProperties new value.
     */
    function setSelectedBrandProperties(?SelectedBrandPropertiesSettings $selectedBrandProperties)
    {
        $this->selectedBrandProperties = $selectedBrandProperties;
        return $this;
    }
}
