<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ProductsViewedAfterViewingContentRequest extends ProductRecommendationRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.ProductsViewedAfterViewingContentRequest, Relewise.Client";
    public string $contentId;
    public static function create(?Language $language, ?Currency $currency, string $displayedAtLocationType, User $user, string $contentId) : ProductsViewedAfterViewingContentRequest
    {
        $result = new ProductsViewedAfterViewingContentRequest();
        $result->language = $language;
        $result->currency = $currency;
        $result->displayedAtLocationType = $displayedAtLocationType;
        $result->user = $user;
        $result->contentId = $contentId;
        return $result;
    }
    public static function hydrate(array $arr) : ProductsViewedAfterViewingContentRequest
    {
        $result = ProductRecommendationRequest::hydrateBase(new ProductsViewedAfterViewingContentRequest(), $arr);
        if (array_key_exists("contentId", $arr))
        {
            $result->contentId = $arr["contentId"];
        }
        return $result;
    }
    function withContentId(string $contentId)
    {
        $this->contentId = $contentId;
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
