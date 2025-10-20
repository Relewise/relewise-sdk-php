<?php declare(strict_types=1);

namespace Relewise\Models;

/** Defines the settings for the feed recommendation, including page size, seed settings, composition of entities, and selected properties for products, variants, and content. */
class Feed
{
    /** The minimum number of items to return initially and per every FeedRecommendationNextItemsRequest. A higher number of results may be returned if composition configurations dictate so. For example, if a given FeedComposition has a lower bound of 5, and the MinimumPageSize is set to 4, then the feed will return at least 5 items whenever the result contains any derived from that composition element. */
    public int $minimumPageSize;
    /** Optionally used to seed the feed with specific products or content. Useful, for example, when you want to show a feed based on specific product(s) or content, such as a PDP/CDP, a shopping cart, or an order. */
    public ?FeedSeed $seed;
    /** Defines how the feed will be composed, which types of entities to include, how many of each type, and any filters or relevance modifiers that should apply to each type, etc. Multiple FeedComposition instances can be added to compose different types of entities in the feed in the rotation. */
    public array $compositions;
    /** Defines which properties to include for recommended products. When not set, only IDs will be returned. */
    public ?SelectedProductPropertiesSettings $selectedProductProperties;
    /** Defines which properties to include for recommended variants. When not set, only IDs will be returned. */
    public ?SelectedVariantPropertiesSettings $selectedVariantProperties;
    /** Defines which properties to include for recommended content. When not set, only IDs will be returned. */
    public ?SelectedContentPropertiesSettings $selectedContentProperties;
    /** Defines if variants should be included for returned products */
    public ?bool $recommendVariant;
    /** Defines if products should be excluded if they are currently present in the users Cart */
    public ?bool $allowProductsCurrentlyInCart;
    
    /**
     * Initializes a new instance of the Feed class.
     * @param int $minimumPageSize The minimum number of items to return initially and per every
     * @param ?FeedSeed $seed Optionally used to seed the feed with specific products or content. Useful, for example, when you want to show a feed based on specific product(s) or content, such as a PDP/CDP, a shopping cart, or an order.
     * @param FeedComposition[] $composition Defines how the feed will be composed, which types of entities to include, how many of each type, and any filters or relevance modifiers that should apply to each type.
     */
    public static function create(int $minimumPageSize, ?FeedSeed $seed, FeedComposition ... $composition) : Feed
    {
        $result = new Feed();
        $result->minimumPageSize = $minimumPageSize;
        $result->seed = $seed;
        $result->compositions = $composition;
        return $result;
    }
    
    public static function hydrate(array $arr) : Feed
    {
        $result = new Feed();
        if (array_key_exists("minimumPageSize", $arr))
        {
            $result->minimumPageSize = $arr["minimumPageSize"];
        }
        if (array_key_exists("seed", $arr))
        {
            $result->seed = FeedSeed::hydrate($arr["seed"]);
        }
        if (array_key_exists("compositions", $arr))
        {
            $result->compositions = array();
            foreach($arr["compositions"] as &$value)
            {
                array_push($result->compositions, FeedComposition::hydrate($value));
            }
        }
        if (array_key_exists("selectedProductProperties", $arr))
        {
            $result->selectedProductProperties = SelectedProductPropertiesSettings::hydrate($arr["selectedProductProperties"]);
        }
        if (array_key_exists("selectedVariantProperties", $arr))
        {
            $result->selectedVariantProperties = SelectedVariantPropertiesSettings::hydrate($arr["selectedVariantProperties"]);
        }
        if (array_key_exists("selectedContentProperties", $arr))
        {
            $result->selectedContentProperties = SelectedContentPropertiesSettings::hydrate($arr["selectedContentProperties"]);
        }
        if (array_key_exists("recommendVariant", $arr))
        {
            $result->recommendVariant = $arr["recommendVariant"];
        }
        if (array_key_exists("allowProductsCurrentlyInCart", $arr))
        {
            $result->allowProductsCurrentlyInCart = $arr["allowProductsCurrentlyInCart"];
        }
        return $result;
    }
    
    /** The minimum number of items to return initially and per every FeedRecommendationNextItemsRequest. A higher number of results may be returned if composition configurations dictate so. For example, if a given FeedComposition has a lower bound of 5, and the MinimumPageSize is set to 4, then the feed will return at least 5 items whenever the result contains any derived from that composition element. */
    function setMinimumPageSize(int $minimumPageSize)
    {
        $this->minimumPageSize = $minimumPageSize;
        return $this;
    }
    
    /** Optionally used to seed the feed with specific products or content. Useful, for example, when you want to show a feed based on specific product(s) or content, such as a PDP/CDP, a shopping cart, or an order. */
    function setSeed(?FeedSeed $seed)
    {
        $this->seed = $seed;
        return $this;
    }
    
    /** Defines how the feed will be composed, which types of entities to include, how many of each type, and any filters or relevance modifiers that should apply to each type, etc. Multiple FeedComposition instances can be added to compose different types of entities in the feed in the rotation. */
    function setCompositions(FeedComposition ... $compositions)
    {
        $this->compositions = $compositions;
        return $this;
    }
    
    /**
     * Defines how the feed will be composed, which types of entities to include, how many of each type, and any filters or relevance modifiers that should apply to each type, etc. Multiple FeedComposition instances can be added to compose different types of entities in the feed in the rotation.
     * @param FeedComposition[] $compositions new value.
     */
    function setCompositionsFromArray(array $compositions)
    {
        $this->compositions = $compositions;
        return $this;
    }
    
    /** Defines how the feed will be composed, which types of entities to include, how many of each type, and any filters or relevance modifiers that should apply to each type, etc. Multiple FeedComposition instances can be added to compose different types of entities in the feed in the rotation. */
    function addToCompositions(FeedComposition $compositions)
    {
        if (!isset($this->compositions))
        {
            $this->compositions = array();
        }
        array_push($this->compositions, $compositions);
        return $this;
    }
    
    /** Defines which properties to include for recommended products. When not set, only IDs will be returned. */
    function setSelectedProductProperties(?SelectedProductPropertiesSettings $selectedProductProperties)
    {
        $this->selectedProductProperties = $selectedProductProperties;
        return $this;
    }
    
    /** Defines which properties to include for recommended variants. When not set, only IDs will be returned. */
    function setSelectedVariantProperties(?SelectedVariantPropertiesSettings $selectedVariantProperties)
    {
        $this->selectedVariantProperties = $selectedVariantProperties;
        return $this;
    }
    
    /** Defines which properties to include for recommended content. When not set, only IDs will be returned. */
    function setSelectedContentProperties(?SelectedContentPropertiesSettings $selectedContentProperties)
    {
        $this->selectedContentProperties = $selectedContentProperties;
        return $this;
    }
    
    /** Defines if variants should be included for returned products */
    function setRecommendVariant(?bool $recommendVariant)
    {
        $this->recommendVariant = $recommendVariant;
        return $this;
    }
    
    /** Defines if products should be excluded if they are currently present in the users Cart */
    function setAllowProductsCurrentlyInCart(?bool $allowProductsCurrentlyInCart)
    {
        $this->allowProductsCurrentlyInCart = $allowProductsCurrentlyInCart;
        return $this;
    }
}
