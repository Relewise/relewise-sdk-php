<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class PopularProductsRequest extends ProductRecommendationRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.PopularProductsRequest, Relewise.Client";
    public PopularityTypes $basedOn;
    public int $sinceMinutesAgo;
    public static function create(?Language $language, ?Currency $currency, string $displayedAtLocationType, User $user, PopularityTypes $basedOn) : PopularProductsRequest
    {
        $result = new PopularProductsRequest();
        $result->language = $language;
        $result->currency = $currency;
        $result->displayedAtLocationType = $displayedAtLocationType;
        $result->user = $user;
        $result->basedOn = $basedOn;
        return $result;
    }
    public static function hydrate(array $arr) : PopularProductsRequest
    {
        $result = ProductRecommendationRequest::hydrateBase(new PopularProductsRequest(), $arr);
        if (array_key_exists("basedOn", $arr))
        {
            $result->basedOn = PopularityTypes::from($arr["basedOn"]);
        }
        if (array_key_exists("sinceMinutesAgo", $arr))
        {
            $result->sinceMinutesAgo = $arr["sinceMinutesAgo"];
        }
        return $result;
    }
    function withBasedOn(PopularityTypes $basedOn)
    {
        $this->basedOn = $basedOn;
        return $this;
    }
    function withSinceMinutesAgo(int $sinceMinutesAgo)
    {
        $this->sinceMinutesAgo = $sinceMinutesAgo;
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
