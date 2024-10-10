<?php declare(strict_types=1);

namespace Relewise\Models;

class SimilarProductsRequest extends ProductRecommendationRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.SimilarProductsRequest, Relewise.Client";
    
    public ?ProductAndVariantId $existingProductId;
    
    public ?Product $productData;
    
    public bool $considerAlreadyKnownInformationAboutProduct;
    
    public ?SimilarProductsEvaluationSettings $evaluationSettings;
    
    public ?int $explodedVariants;
    
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
        if (array_key_exists("explodedVariants", $arr))
        {
            $result->explodedVariants = $arr["explodedVariants"];
        }
        return $result;
    }
    
    function setExistingProductId(?ProductAndVariantId $existingProductId)
    {
        $this->existingProductId = $existingProductId;
        return $this;
    }
    
    function setProductData(?Product $productData)
    {
        $this->productData = $productData;
        return $this;
    }
    
    function setConsiderAlreadyKnownInformationAboutProduct(bool $considerAlreadyKnownInformationAboutProduct)
    {
        $this->considerAlreadyKnownInformationAboutProduct = $considerAlreadyKnownInformationAboutProduct;
        return $this;
    }
    
    function setEvaluationSettings(?SimilarProductsEvaluationSettings $evaluationSettings)
    {
        $this->evaluationSettings = $evaluationSettings;
        return $this;
    }
    
    function setExplodedVariants(?int $explodedVariants)
    {
        $this->explodedVariants = $explodedVariants;
        return $this;
    }
    
    function setSettings(ProductRecommendationRequestSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
    
    function setLanguage(?Language $language)
    {
        $this->language = $language;
        return $this;
    }
    
    function setUser(?User $user)
    {
        $this->user = $user;
        return $this;
    }
    
    function setRelevanceModifiers(RelevanceModifierCollection $relevanceModifiers)
    {
        $this->relevanceModifiers = $relevanceModifiers;
        return $this;
    }
    
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    
    function setDisplayedAtLocationType(string $displayedAtLocationType)
    {
        $this->displayedAtLocationType = $displayedAtLocationType;
        return $this;
    }
    
    function setCurrency(?Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
}
