<?php declare(strict_types=1);

namespace Relewise\Models;

use JsonSerializable;

/** Used to initialize a feed recommendation for a user (including anonymous ones). Once initialized, additional pages for the feed can be requested using the lightweight FeedRecommendationNextItemsRequest. You may specify any global filters or relevance modifiers that should apply to the entire feed, such as filtering out products that are not in stock, or relevance modifiers that should apply to all products in the feed. Individual FeedComposition instances can also specify their own additional filters and relevance modifiers, which will be applied only to the elements in that specific composition element. */
class FeedRecommendationInitializationRequest extends RecommendationRequest implements JsonSerializable
{
    public string $typeDefinition = "Relewise.Client.Requests.Recommendations.Feed.FeedRecommendationInitializationRequest, Relewise.Client";
    /** Defines the settings for the feed recommendation, including page size, seed settings, composition of entities, selected properties for products, variants and content. */
    public Feed $feed;
    
    public static function create(?Language $language, ?Currency $currency, string $displayedAtLocationType, User $user, Feed $feed) : FeedRecommendationInitializationRequest
    {
        $result = new FeedRecommendationInitializationRequest();
        $result->language = $language;
        $result->currency = $currency;
        $result->displayedAtLocationType = $displayedAtLocationType;
        $result->user = $user;
        $result->feed = $feed;
        return $result;
    }
    
    public static function hydrate(array $arr) : FeedRecommendationInitializationRequest
    {
        $result = RecommendationRequest::hydrateBase(new FeedRecommendationInitializationRequest(), $arr);
        if (array_key_exists("feed", $arr))
        {
            $result->feed = Feed::hydrate($arr["feed"]);
        }
        return $result;
    }
    
    /** Defines the settings for the feed recommendation, including page size, seed settings, composition of entities, selected properties for products, variants and content. */
    function setFeed(Feed $feed)
    {
        $this->feed = $feed;
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
    
    function addToContextValues(string $key, string $value)
    {
        if (!isset($this->contextValues))
        {
            $this->contextValues = array();
        }
        $this->contextValues[$key] = $value;
        return $this;
    }
    
    /** @param ?array<string, string> $contextValues associative array. */
    function setContextValuesFromAssociativeArray(array $contextValues)
    {
        $this->contextValues = $contextValues;
        return $this;
    }

    public function jsonSerialize(): mixed
    {
        $result = array();
        foreach ((array) $this as $name => $value)
        {
            // Private and protected property names contain a NUL byte when cast to an array.
            if (!str_contains((string) $name, "\0"))
            {
                $result[$name] = $value;
            }
        }
        if (isset($this->contextValues))
        {
            $result["contextValues"] = (object) $this->contextValues;
        }
        return (object) $result;
    }
}
