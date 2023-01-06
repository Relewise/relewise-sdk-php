<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

abstract class BrandRecommendationRequest extends RecommendationRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.BrandRecommendationRequest, Relewise.Client";
    public BrandRecommendationRequestSettings $settings;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.Recommendations.PersonalBrandRecommendationRequest, Relewise.Client")
        {
            return PersonalBrandRecommendationRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.PopularBrandsRecommendationRequest, Relewise.Client")
        {
            return PopularBrandsRecommendationRequest::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = RecommendationRequest::hydrateBase($result, $arr);
        if (array_key_exists("settings", $arr))
        {
            $result->settings = BrandRecommendationRequestSettings::hydrate($arr["settings"]);
        }
        return $result;
    }
    function withSettings(BrandRecommendationRequestSettings $settings)
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
