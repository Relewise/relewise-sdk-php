<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

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
    function withContentIds(string ... $contentIds)
    {
        $this->contentIds = $contentIds;
        return $this;
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
