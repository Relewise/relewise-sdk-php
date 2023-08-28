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
    function setContentIds(string ... $contentIds)
    {
        $this->contentIds = $contentIds;
        return $this;
    }
    function setContentIdsFromArray(array $contentIds)
    {
        $this->contentIds = $contentIds;
        return $this;
    }
    function addToContentIds(string $contentIds)
    {
        if (!isset($this->contentIds))
        {
            $this->contentIds = array();
        }
        array_push($this->contentIds, $contentIds);
        return $this;
    }
    function setSettings(ContentRecommendationRequestSettings $settings)
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
