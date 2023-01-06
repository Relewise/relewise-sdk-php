<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class PersonalContentRecommendationRequest extends ContentRecommendationRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.PersonalContentRecommendationRequest, Relewise.Client";
    public static function create() : PersonalContentRecommendationRequest
    {
        $result = new PersonalContentRecommendationRequest();
        return $result;
    }
    public static function hydrate(array $arr) : PersonalContentRecommendationRequest
    {
        $result = ContentRecommendationRequest::hydrateBase(new PersonalContentRecommendationRequest(), $arr);
        return $result;
    }
    function withSettings(ContentRecommendationRequestSettings $settings)
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
