<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

class ContentsViewedAfterViewingMultipleContentsRequest extends ContentRecommendationRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.ContentsViewedAfterViewingMultipleContentsRequest, Relewise.Client";
    public array $contentIds;
    public static function create(?Language $language, ?Currency $currency, string $displayedAtLocationType, User $user, string ... $contentIds) : ContentsViewedAfterViewingMultipleContentsRequest
    {
        $result = new ContentsViewedAfterViewingMultipleContentsRequest();
        $result->language = $language;
        $result->currency = $currency;
        $result->displayedAtLocationType = $displayedAtLocationType;
        $result->user = $user;
        $result->contentIds = $contentIds;
        return $result;
    }
    public static function hydrate(array $arr) : ContentsViewedAfterViewingMultipleContentsRequest
    {
        $result = ContentRecommendationRequest::hydrateBase(new ContentsViewedAfterViewingMultipleContentsRequest(), $arr);
        if (array_key_exists("contentIds", $arr))
        {
            $result->contentIds = array();
            foreach($arr["contentIds"] as &$value)
            {
                array_push($result->contentIds, $value);
            }
        }
        return $result;
    }
    /**
     * Sets contentIds to a new value.
     * @param string[] $contentIds new value.
     */
    function setContentIds(string ... $contentIds)
    {
        $this->contentIds = $contentIds;
        return $this;
    }
    /**
     * Sets contentIds to a new value from an array.
     * @param string[] $contentIds new value.
     */
    function setContentIdsFromArray(array $contentIds)
    {
        $this->contentIds = $contentIds;
        return $this;
    }
    /**
     * Adds a new element to contentIds.
     * @param string $contentIds new element.
     */
    function addToContentIds(string $contentIds)
    {
        if (!isset($this->contentIds))
        {
            $this->contentIds = array();
        }
        array_push($this->contentIds, $contentIds);
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
