<?php declare(strict_types=1);

namespace Relewise\Models;

class PopularProductsRequest extends ProductRecommendationRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.PopularProductsRequest, Relewise.Client";
    public PopularityTypes $basedOn;
    public int $sinceMinutesAgo;
    /** A selector for changing the weighing of observed views or purchases on an entity basis when making the recommendation. */
    public ?PopularityMultiplierSelector $popularityMultiplier;
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
        if (array_key_exists("popularityMultiplier", $arr))
        {
            $result->popularityMultiplier = PopularityMultiplierSelector::hydrate($arr["popularityMultiplier"]);
        }
        return $result;
    }
    function setBasedOn(PopularityTypes $basedOn)
    {
        $this->basedOn = $basedOn;
        return $this;
    }
    function setSinceMinutesAgo(int $sinceMinutesAgo)
    {
        $this->sinceMinutesAgo = $sinceMinutesAgo;
        return $this;
    }
    /** A selector for changing the weighing of observed views or purchases on an entity basis when making the recommendation. */
    function setPopularityMultiplier(?PopularityMultiplierSelector $popularityMultiplier)
    {
        $this->popularityMultiplier = $popularityMultiplier;
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
