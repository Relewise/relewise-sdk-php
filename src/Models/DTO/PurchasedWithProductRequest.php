<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class PurchasedWithProductRequest extends ProductRecommendationRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.PurchasedWithProductRequest, Relewise.Client";
    public ProductAndVariantId $productAndVariantId;
    public static function create(?Language $language, ?Currency $currency, string $displayedAtLocationType, User $user, ProductAndVariantId $productAndVariantId) : PurchasedWithProductRequest
    {
        $result = new PurchasedWithProductRequest();
        $result->language = $language;
        $result->currency = $currency;
        $result->displayedAtLocationType = $displayedAtLocationType;
        $result->user = $user;
        $result->productAndVariantId = $productAndVariantId;
        return $result;
    }
    public static function hydrate(array $arr) : PurchasedWithProductRequest
    {
        $result = ProductRecommendationRequest::hydrateBase(new PurchasedWithProductRequest(), $arr);
        if (array_key_exists("productAndVariantId", $arr))
        {
            $result->productAndVariantId = ProductAndVariantId::hydrate($arr["productAndVariantId"]);
        }
        return $result;
    }
    function withProductAndVariantId(ProductAndVariantId $productAndVariantId)
    {
        $this->productAndVariantId = $productAndVariantId;
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
}
