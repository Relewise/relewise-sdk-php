<?php declare(strict_types=1);

namespace Relewise\Models;

/** Defines an element in the feed composition, specifying the type of entity, the count of entities to include, as well as any filters or relevance modifiers that should be applied in addition to any global ones. */
class FeedComposition
{
    /** Gets or sets the type of the entity. */
    public FeedCompositionEntityType $type;
    /** Gets or sets the desired number of elements to return. 1-1 means exactly 1 element, 0-1 means up to 1 element, 1-5 means between 1 and 5 elements, etc. If the lower bound and upper bound are not equal, the evaluated relevancy will determine how many elements within the allowed range to return. If the lower bound is greater than 0, the feed will always return at least that many elements (unless overridden via Fill), potentially of lower quality. If fewer relevant items are available than requested, the default fill strategy will be used, unless overridden via Fill. Note: The specified lower bound is not guaranteed to be met if filters on either FeedRecommendationInitializationRequest, FeedComposition, or via Merchandising prevent the requested number of items from being found. */
    public intRange $count;
    /** Additional filters that should be applied. */
    public ?FilterCollection $filters;
    /** Additional relevance modifiers that should be applied. */
    public ?RelevanceModifierCollection $relevanceModifiers;
    /** Optionally provide an alternative fill strategy for this composition element, which will be used if fewer relevant items are available than requested via the lower bound of Count. Tip: You may recursively configure a nested chain of fallbacks via Fill on the Fill element for advanced composition needs. */
    public ?FeedComposition $fill;
    /** An optional name for the composition element, useful if you need to know from which composition element a result entity was returned for rendering or debugging purposes. If set, this name will be returned for results based on this composition element in Name. */
    public ?string $name;
    /** Determines whether to include empty results for this composition element. Useful in combination with Name if you need to show a placeholder or alternative content when no results are found for this composition element. The default is false, meaning empty results will not be included in recommendation responses. */
    public bool $includeEmptyResults;
    /** If specified, this composition will only be included in the rotation the specified number of times. Any subsequent rotations will exclude this composition element. Leave null to apply no limit. */
    public ?int $rotationLimit;
    /** If specified (minimum 1), this composition will only be included in the rotation the specified number of times per request. Any subsequent rotations within the same request will exclude this composition element. Leave null to apply no per-request limit. */
    public ?int $rotationLimitPerRequest;
    /** If true, the entire composition element will be skipped if the requested count cannot be met. Example: If true: Requesting 3-5 results, but only 2 are available, then those 2 will be dropped as the lower bound of 3 cannot be met. Example: If false (default): Requesting 3-5 results, but only 2 are available, then those 2 will still be returned. */
    public bool $skipEntirelyIfUnableToMeetCount;
    
    /**
     * Initializes a new instance of the FeedComposition class.
     * @param FeedCompositionEntityType $type The type of the entity represented by this composition element.
     * @param intRange $count The desired range of counts for the entity. The lower bound must be greater than or equal to 0, and the upper bound must be at least 1 and greater than or equal to the lower bound.
     */
    public static function create(FeedCompositionEntityType $type, intRange $count) : FeedComposition
    {
        $result = new FeedComposition();
        $result->type = $type;
        $result->count = $count;
        return $result;
    }
    
    public static function hydrate(array $arr) : FeedComposition
    {
        $result = new FeedComposition();
        if (array_key_exists("type", $arr))
        {
            $result->type = FeedCompositionEntityType::from($arr["type"]);
        }
        if (array_key_exists("count", $arr))
        {
            $result->count = intRange::hydrate($arr["count"]);
        }
        if (array_key_exists("filters", $arr))
        {
            $result->filters = FilterCollection::hydrate($arr["filters"]);
        }
        if (array_key_exists("relevanceModifiers", $arr))
        {
            $result->relevanceModifiers = RelevanceModifierCollection::hydrate($arr["relevanceModifiers"]);
        }
        if (array_key_exists("fill", $arr))
        {
            $result->fill = FeedComposition::hydrate($arr["fill"]);
        }
        if (array_key_exists("name", $arr))
        {
            $result->name = $arr["name"];
        }
        if (array_key_exists("includeEmptyResults", $arr))
        {
            $result->includeEmptyResults = $arr["includeEmptyResults"];
        }
        if (array_key_exists("rotationLimit", $arr))
        {
            $result->rotationLimit = $arr["rotationLimit"];
        }
        if (array_key_exists("rotationLimitPerRequest", $arr))
        {
            $result->rotationLimitPerRequest = $arr["rotationLimitPerRequest"];
        }
        if (array_key_exists("skipEntirelyIfUnableToMeetCount", $arr))
        {
            $result->skipEntirelyIfUnableToMeetCount = $arr["skipEntirelyIfUnableToMeetCount"];
        }
        return $result;
    }
    
    /** Gets or sets the type of the entity. */
    function setType(FeedCompositionEntityType $type)
    {
        $this->type = $type;
        return $this;
    }
    
    /** Gets or sets the desired number of elements to return. 1-1 means exactly 1 element, 0-1 means up to 1 element, 1-5 means between 1 and 5 elements, etc. If the lower bound and upper bound are not equal, the evaluated relevancy will determine how many elements within the allowed range to return. If the lower bound is greater than 0, the feed will always return at least that many elements (unless overridden via Fill), potentially of lower quality. If fewer relevant items are available than requested, the default fill strategy will be used, unless overridden via Fill. Note: The specified lower bound is not guaranteed to be met if filters on either FeedRecommendationInitializationRequest, FeedComposition, or via Merchandising prevent the requested number of items from being found. */
    function setCount(intRange $count)
    {
        $this->count = $count;
        return $this;
    }
    
    /** Additional filters that should be applied. */
    function setFilters(?FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    
    /** Additional relevance modifiers that should be applied. */
    function setRelevanceModifiers(?RelevanceModifierCollection $relevanceModifiers)
    {
        $this->relevanceModifiers = $relevanceModifiers;
        return $this;
    }
    
    /** Optionally provide an alternative fill strategy for this composition element, which will be used if fewer relevant items are available than requested via the lower bound of Count. Tip: You may recursively configure a nested chain of fallbacks via Fill on the Fill element for advanced composition needs. */
    function setFill(?FeedComposition $fill)
    {
        $this->fill = $fill;
        return $this;
    }
    
    /** An optional name for the composition element, useful if you need to know from which composition element a result entity was returned for rendering or debugging purposes. If set, this name will be returned for results based on this composition element in Name. */
    function setName(?string $name)
    {
        $this->name = $name;
        return $this;
    }
    
    /** Determines whether to include empty results for this composition element. Useful in combination with Name if you need to show a placeholder or alternative content when no results are found for this composition element. The default is false, meaning empty results will not be included in recommendation responses. */
    function setIncludeEmptyResults(bool $includeEmptyResults)
    {
        $this->includeEmptyResults = $includeEmptyResults;
        return $this;
    }
    
    /** If specified, this composition will only be included in the rotation the specified number of times. Any subsequent rotations will exclude this composition element. Leave null to apply no limit. */
    function setRotationLimit(?int $rotationLimit)
    {
        $this->rotationLimit = $rotationLimit;
        return $this;
    }
    
    /** If specified (minimum 1), this composition will only be included in the rotation the specified number of times per request. Any subsequent rotations within the same request will exclude this composition element. Leave null to apply no per-request limit. */
    function setRotationLimitPerRequest(?int $rotationLimitPerRequest)
    {
        $this->rotationLimitPerRequest = $rotationLimitPerRequest;
        return $this;
    }
    
    /** If true, the entire composition element will be skipped if the requested count cannot be met. Example: If true: Requesting 3-5 results, but only 2 are available, then those 2 will be dropped as the lower bound of 3 cannot be met. Example: If false (default): Requesting 3-5 results, but only 2 are available, then those 2 will still be returned. */
    function setSkipEntirelyIfUnableToMeetCount(bool $skipEntirelyIfUnableToMeetCount)
    {
        $this->skipEntirelyIfUnableToMeetCount = $skipEntirelyIfUnableToMeetCount;
        return $this;
    }
}
