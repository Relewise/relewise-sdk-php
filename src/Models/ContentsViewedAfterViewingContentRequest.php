<?php declare(strict_types=1);

namespace Relewise\Models;

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
    
    function setContentId(string $contentId)
    {
        $this->contentId = $contentId;
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
