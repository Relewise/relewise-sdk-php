<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ContentsViewedAfterViewingContentRequest extends ContentRecommendationRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.ContentsViewedAfterViewingContentRequest, Relewise.Client";
    public string $contentId;
    public static function create(?Language $language, ?Currency $currency, string $displayedAtLocationType, User $user, string $contentId) : ContentsViewedAfterViewingContentRequest
    {
        $result = new ContentsViewedAfterViewingContentRequest();
        $result->language = $language;
        $result->currency = $currency;
        $result->displayedAtLocationType = $displayedAtLocationType;
        $result->user = $user;
        $result->contentId = $contentId;
        return $result;
    }
    public static function hydrate(array $arr) : ContentsViewedAfterViewingContentRequest
    {
        $result = ContentRecommendationRequest::hydrateBase(new ContentsViewedAfterViewingContentRequest(), $arr);
        if (array_key_exists("contentId", $arr))
        {
            $result->contentId = $arr["contentId"];
        }
        return $result;
    }
    /**
     * Sets contentId to a new value.
     * @param string $contentId new value.
     */
    function setContentId(string $contentId)
    {
        $this->contentId = $contentId;
        return $this;
    }
    /**
     * Sets settings to a new value.
     * @param ContentRecommendationRequestSettings $settings new value.
     */
    function setSettings(ContentRecommendationRequestSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
    /**
     * Sets language to a new value.
     * @param ?Language $language new value.
     */
    function setLanguage(?Language $language)
    {
        $this->language = $language;
        return $this;
    }
    /**
     * Sets user to a new value.
     * @param User $user new value.
     */
    function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }
    /**
     * Sets relevanceModifiers to a new value.
     * @param RelevanceModifierCollection $relevanceModifiers new value.
     */
    function setRelevanceModifiers(RelevanceModifierCollection $relevanceModifiers)
    {
        $this->relevanceModifiers = $relevanceModifiers;
        return $this;
    }
    /**
     * Sets filters to a new value.
     * @param FilterCollection $filters new value.
     */
    function setFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    /**
     * Sets displayedAtLocationType to a new value.
     * @param string $displayedAtLocationType new value.
     */
    function setDisplayedAtLocationType(string $displayedAtLocationType)
    {
        $this->displayedAtLocationType = $displayedAtLocationType;
        return $this;
    }
    /**
     * Sets currency to a new value.
     * @param ?Currency $currency new value.
     */
    function setCurrency(?Currency $currency)
    {
        $this->currency = $currency;
        return $this;
    }
}
