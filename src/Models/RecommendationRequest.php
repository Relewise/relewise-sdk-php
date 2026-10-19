<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class RecommendationRequest extends LicensedRequest
{
    public string $typeDefinition = "";
    public ?Language $language;
    public ?User $user;
    public RelevanceModifierCollection $relevanceModifiers;
    public FilterCollection $filters;
    public string $displayedAtLocationType;
    public ?Currency $currency;
    /** Context values used to determine which merchandising rules apply to this request, such as DeviceType=Mobile or SplitTestVariant=A. */
    public ?array $contextValues;
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.Recommendations.ContentsViewedAfterViewingContentRequest, Relewise.Client")
        {
            return ContentsViewedAfterViewingContentRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.ContentsViewedAfterViewingMultipleContentsRequest, Relewise.Client")
        {
            return ContentsViewedAfterViewingMultipleContentsRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.ContentsViewedAfterViewingMultipleProductsRequest, Relewise.Client")
        {
            return ContentsViewedAfterViewingMultipleProductsRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.ContentsViewedAfterViewingProductRequest, Relewise.Client")
        {
            return ContentsViewedAfterViewingProductRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.CustomProductRecommendationRequest, Relewise.Client")
        {
            return CustomProductRecommendationRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.PersonalBrandRecommendationRequest, Relewise.Client")
        {
            return PersonalBrandRecommendationRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.PersonalContentCategoryRecommendationRequest, Relewise.Client")
        {
            return PersonalContentCategoryRecommendationRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.PersonalContentRecommendationRequest, Relewise.Client")
        {
            return PersonalContentRecommendationRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.PersonalProductCategoryRecommendationRequest, Relewise.Client")
        {
            return PersonalProductCategoryRecommendationRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.PersonalProductRecommendationRequest, Relewise.Client")
        {
            return PersonalProductRecommendationRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.PopularBrandsRecommendationRequest, Relewise.Client")
        {
            return PopularBrandsRecommendationRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.PopularContentCategoriesRecommendationRequest, Relewise.Client")
        {
            return PopularContentCategoriesRecommendationRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.PopularContentsRequest, Relewise.Client")
        {
            return PopularContentsRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.PopularProductCategoriesRecommendationRequest, Relewise.Client")
        {
            return PopularProductCategoriesRecommendationRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.PopularProductsRequest, Relewise.Client")
        {
            return PopularProductsRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.PopularSearchTermsRecommendationRequest, Relewise.Client")
        {
            return PopularSearchTermsRecommendationRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.ProductsViewedAfterViewingContentRequest, Relewise.Client")
        {
            return ProductsViewedAfterViewingContentRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.ProductsViewedAfterViewingProductRequest, Relewise.Client")
        {
            return ProductsViewedAfterViewingProductRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.PurchasedWithCurrentCartRequest, Relewise.Client")
        {
            return PurchasedWithCurrentCartRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.PurchasedWithMultipleProductsRequest, Relewise.Client")
        {
            return PurchasedWithMultipleProductsRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.PurchasedWithProductRequest, Relewise.Client")
        {
            return PurchasedWithProductRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.RecentlyViewedProductsRequest, Relewise.Client")
        {
            return RecentlyViewedProductsRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.SearchTermBasedProductRecommendationRequest, Relewise.Client")
        {
            return SearchTermBasedProductRecommendationRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.SimilarProductsRequest, Relewise.Client")
        {
            return SimilarProductsRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.SortProductsRequest, Relewise.Client")
        {
            return SortProductsRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.SortVariantsRequest, Relewise.Client")
        {
            return SortVariantsRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.Feed.FeedRecommendationInitializationRequest, Relewise.Client")
        {
            return FeedRecommendationInitializationRequest::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = LicensedRequest::hydrateBase($result, $arr);
        if (array_key_exists("language", $arr))
        {
            $result->language = Language::hydrate($arr["language"]);
        }
        if (array_key_exists("user", $arr))
        {
            $result->user = User::hydrate($arr["user"]);
        }
        if (array_key_exists("relevanceModifiers", $arr))
        {
            $result->relevanceModifiers = RelevanceModifierCollection::hydrate($arr["relevanceModifiers"]);
        }
        if (array_key_exists("filters", $arr))
        {
            $result->filters = FilterCollection::hydrate($arr["filters"]);
        }
        if (array_key_exists("displayedAtLocationType", $arr))
        {
            $result->displayedAtLocationType = $arr["displayedAtLocationType"];
        }
        if (array_key_exists("currency", $arr))
        {
            $result->currency = Currency::hydrate($arr["currency"]);
        }
        if (array_key_exists("contextValues", $arr))
        {
            $result->contextValues = array();
            foreach($arr["contextValues"] as $key => $value)
            {
                $result->contextValues[$key] = $value;
            }
        }
        return $result;
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
    
    /** Context values used to determine which merchandising rules apply to this request, such as DeviceType=Mobile or SplitTestVariant=A. */
    function addToContextValues(string $key, string $value)
    {
        if (!isset($this->contextValues))
        {
            $this->contextValues = array();
        }
        $this->contextValues[$key] = $value;
        return $this;
    }
    
    /**
     * Context values used to determine which merchandising rules apply to this request, such as DeviceType=Mobile or SplitTestVariant=A.
     * @param ?array<string, string> $contextValues associative array.
     */
    function setContextValuesFromAssociativeArray(array $contextValues)
    {
        $this->contextValues = $contextValues;
        return $this;
    }
}
