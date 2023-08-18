<?php declare(strict_types=1);

namespace Relewise\Models;

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
    function setProductAndVariantId(ProductAndVariantId $productAndVariantId)
    {
        $this->productAndVariantId = $productAndVariantId;
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
    function setUser(User $user)
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
