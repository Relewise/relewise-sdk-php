<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class SimilarProductsRequest extends ProductRecommendationRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.SimilarProductsRequest, Relewise.Client";
    public ?ProductAndVariantId $existingProductId;
    public ?Product $productData;
    public bool $considerAlreadyKnownInformationAboutProduct;
    public ?SimilarProductsEvaluationSettings $evaluationSettings;
    public static function create(?Language $language, ?Currency $currency, string $displayedAtLocationType, User $user, ?SimilarProductsEvaluationSettings $evaluationSettings = Null) : SimilarProductsRequest
    {
        $result = new SimilarProductsRequest();
        $result->language = $language;
        $result->currency = $currency;
        $result->displayedAtLocationType = $displayedAtLocationType;
        $result->user = $user;
        $result->evaluationSettings = $evaluationSettings;
        return $result;
    }
    public static function hydrate(array $arr) : SimilarProductsRequest
    {
        $result = ProductRecommendationRequest::hydrateBase(new SimilarProductsRequest(), $arr);
        if (array_key_exists("existingProductId", $arr))
        {
            $result->existingProductId = ProductAndVariantId::hydrate($arr["existingProductId"]);
        }
        if (array_key_exists("productData", $arr))
        {
            $result->productData = Product::hydrate($arr["productData"]);
        }
        if (array_key_exists("considerAlreadyKnownInformationAboutProduct", $arr))
        {
            $result->considerAlreadyKnownInformationAboutProduct = $arr["considerAlreadyKnownInformationAboutProduct"];
        }
        if (array_key_exists("evaluationSettings", $arr))
        {
            $result->evaluationSettings = SimilarProductsEvaluationSettings::hydrate($arr["evaluationSettings"]);
        }
        return $result;
    }
    /**
     * Sets existingProductId to a new value.
     * @param ?ProductAndVariantId $existingProductId new value.
     */
    function setExistingProductId(?ProductAndVariantId $existingProductId)
    {
        $this->existingProductId = $existingProductId;
        return $this;
    }
    /**
     * Sets productData to a new value.
     * @param ?Product $productData new value.
     */
    function setProductData(?Product $productData)
    {
        $this->productData = $productData;
        return $this;
    }
    /**
     * Sets considerAlreadyKnownInformationAboutProduct to a new value.
     * @param bool $considerAlreadyKnownInformationAboutProduct new value.
     */
    function setConsiderAlreadyKnownInformationAboutProduct(bool $considerAlreadyKnownInformationAboutProduct)
    {
        $this->considerAlreadyKnownInformationAboutProduct = $considerAlreadyKnownInformationAboutProduct;
        return $this;
    }
    /**
     * Sets evaluationSettings to a new value.
     * @param ?SimilarProductsEvaluationSettings $evaluationSettings new value.
     */
    function setEvaluationSettings(?SimilarProductsEvaluationSettings $evaluationSettings)
    {
        $this->evaluationSettings = $evaluationSettings;
        return $this;
    }
    /**
     * Sets settings to a new value.
     * @param ProductRecommendationRequestSettings $settings new value.
     */
    function setSettings(ProductRecommendationRequestSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
    /**
     * Sets language to a new value.
     * @param ?Language $language new value.
     */
    function setLanguage(?Language $language)
    {
        $this->language = $language;
        return $this;
    }
    /**
     * Sets user to a new value.
     * @param User $user new value.
     */
    function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }
    /**
     * Sets relevanceModifiers to a new value.
     * @param RelevanceModifierCollection $relevanceModifiers new value.
     */
    function setRelevanceModifiers(RelevanceModifierCollection $relevanceModifiers)
    {
        $this->relevanceModifiers = $relevanceModifiers;
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
    /**
     * Sets displayedAtLocationType to a new value.
     * @param string $displayedAtLocationType new value.
     */
    function setDisplayedAtLocationType(string $displayedAtLocationType)
    {
        $this->displayedAtLocationType = $displayedAtLocationType;
        return $this;
    }
    /**
     * Sets currency to a new value.
     * @param ?Currency $currency new value.
     */
    function setCurrency(?Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
}
