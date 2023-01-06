<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class PersonalContentCategoryRecommendationRequest extends ContentCategoryRecommendationRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.PersonalContentCategoryRecommendationRequest, Relewise.Client";
    public int $sinceMinutesAgo;
    public ContentCategoryRecommendationWeights $weights;
    public static function create(?Language $language, ?Currency $currency, string $displayedAtLocationType, User $user, ContentCategoryRecommendationWeights $weights) : PersonalContentCategoryRecommendationRequest
    {
        $result = new PersonalContentCategoryRecommendationRequest();
        $result->language = $language;
        $result->currency = $currency;
        $result->displayedAtLocationType = $displayedAtLocationType;
        $result->user = $user;
        $result->weights = $weights;
        return $result;
    }
    public static function hydrate(array $arr) : PersonalContentCategoryRecommendationRequest
    {
        $result = ContentCategoryRecommendationRequest::hydrateBase(new PersonalContentCategoryRecommendationRequest(), $arr);
        if (array_key_exists("sinceMinutesAgo", $arr))
        {
            $result->sinceMinutesAgo = $arr["sinceMinutesAgo"];
        }
        if (array_key_exists("weights", $arr))
        {
            $result->weights = ContentCategoryRecommendationWeights::hydrate($arr["weights"]);
        }
        return $result;
    }
    function withSinceMinutesAgo(int $sinceMinutesAgo)
    {
        $this->sinceMinutesAgo = $sinceMinutesAgo;
        return $this;
    }
    function withWeights(ContentCategoryRecommendationWeights $weights)
    {
        $this->weights = $weights;
        return $this;
    }
    function withSettings(ContentCategoryRecommendationRequestSettings $settings)
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
