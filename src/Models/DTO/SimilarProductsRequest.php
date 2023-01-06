<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class SimilarProductsRequest extends ProductRecommendationRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.SimilarProductsRequest, Relewise.Client";
    public ?ProductAndVariantId $existingProductId;
    public ?Product $productData;
    public bool $considerAlreadyKnownInformationAboutProduct;
    public ?SimilarProductsEvaluationSettings $evaluationSettings;
    public static function create(?Language $language, ?Currency $currency, string $displayedAtLocationType, User $user, ?SimilarProductsEvaluationSettings $evaluationSettings) : SimilarProductsRequest
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
    function withExistingProductId(?ProductAndVariantId $existingProductId)
    {
        $this->existingProductId = $existingProductId;
        return $this;
    }
    function withProductData(?Product $productData)
    {
        $this->productData = $productData;
        return $this;
    }
    function withConsiderAlreadyKnownInformationAboutProduct(bool $considerAlreadyKnownInformationAboutProduct)
    {
        $this->considerAlreadyKnownInformationAboutProduct = $considerAlreadyKnownInformationAboutProduct;
        return $this;
    }
    function withEvaluationSettings(?SimilarProductsEvaluationSettings $evaluationSettings)
    {
        $this->evaluationSettings = $evaluationSettings;
        return $this;
    }
    function withSettings(ProductRecommendationRequestSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
    function withLanguage(?Language $language)
    {
        $this->language = $language;
        return $this;
    }
    function withUser(User $user)
    {
        $this->user = $user;
        return $this;
    }
    function withRelevanceModifiers(RelevanceModifierCollection $relevanceModifiers)
    {
        $this->relevanceModifiers = $relevanceModifiers;
        return $this;
    }
    function withFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    function withDisplayedAtLocationType(string $displayedAtLocationType)
    {
        $this->displayedAtLocationType = $displayedAtLocationType;
        return $this;
    }
    function withCurrency(?Currency $currency)
    {
        $this->currency = $currency;
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
}
