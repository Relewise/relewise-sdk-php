<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class LicensedRequest
{
    public string $typeDefinition = "Relewise.Client.Requests.LicensedRequest, Relewise.Client";
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.Triggers.DeleteTriggerConfigurationRequest, Relewise.Client")
        {
            return DeleteTriggerConfigurationRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Triggers.GlobalTriggerConfigurationRequest, Relewise.Client")
        {
            return GlobalTriggerConfigurationRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Triggers.SaveGlobalTriggerConfigurationRequest, Relewise.Client")
        {
            return SaveGlobalTriggerConfigurationRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Triggers.SaveTriggerConfigurationRequest, Relewise.Client")
        {
            return SaveTriggerConfigurationRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Triggers.TriggerConfigurationRequest, Relewise.Client")
        {
            return TriggerConfigurationRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Triggers.TriggerConfigurationsRequest, Relewise.Client")
        {
            return TriggerConfigurationsRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Triggers.TriggerResultRequest, Relewise.Client")
        {
            return TriggerResultRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.BatchedTrackingRequest, Relewise.Client")
        {
            return BatchedTrackingRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackBrandAdministrativeActionRequest, Relewise.Client")
        {
            return TrackBrandAdministrativeActionRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackBrandUpdateRequest, Relewise.Client")
        {
            return TrackBrandUpdateRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackBrandViewRequest, Relewise.Client")
        {
            return TrackBrandViewRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackCartRequest, Relewise.Client")
        {
            return TrackCartRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackCompanyAdministrativeActionRequest, Relewise.Client")
        {
            return TrackCompanyAdministrativeActionRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackCompanyUpdateRequest, Relewise.Client")
        {
            return TrackCompanyUpdateRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackContentAdministrativeActionRequest, Relewise.Client")
        {
            return TrackContentAdministrativeActionRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackContentCategoryAdministrativeActionRequest, Relewise.Client")
        {
            return TrackContentCategoryAdministrativeActionRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackContentCategoryUpdateRequest, Relewise.Client")
        {
            return TrackContentCategoryUpdateRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackContentCategoryViewRequest, Relewise.Client")
        {
            return TrackContentCategoryViewRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackContentUpdateRequest, Relewise.Client")
        {
            return TrackContentUpdateRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackContentViewRequest, Relewise.Client")
        {
            return TrackContentViewRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackOrderRequest, Relewise.Client")
        {
            return TrackOrderRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackProductAdministrativeActionRequest, Relewise.Client")
        {
            return TrackProductAdministrativeActionRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackProductCategoryAdministrativeActionRequest, Relewise.Client")
        {
            return TrackProductCategoryAdministrativeActionRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackProductCategoryUpdateRequest, Relewise.Client")
        {
            return TrackProductCategoryUpdateRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackProductCategoryViewRequest, Relewise.Client")
        {
            return TrackProductCategoryViewRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackProductUpdateRequest, Relewise.Client")
        {
            return TrackProductUpdateRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackProductViewRequest, Relewise.Client")
        {
            return TrackProductViewRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackSearchTermRequest, Relewise.Client")
        {
            return TrackSearchTermRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Tracking.TrackUserUpdateRequest, Relewise.Client")
        {
            return TrackUserUpdateRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.ContentCategorySearchRequest, Relewise.Client")
        {
            return ContentCategorySearchRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.ContentSearchRequest, Relewise.Client")
        {
            return ContentSearchRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.DeleteSearchIndexRequest, Relewise.Client")
        {
            return DeleteSearchIndexRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.DeleteSynonymsRequest, Relewise.Client")
        {
            return DeleteSynonymsRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.ProductCategorySearchRequest, Relewise.Client")
        {
            return ProductCategorySearchRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.ProductSearchRequest, Relewise.Client")
        {
            return ProductSearchRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.SaveSearchIndexRequest, Relewise.Client")
        {
            return SaveSearchIndexRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.SaveSynonymsRequest, Relewise.Client")
        {
            return SaveSynonymsRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.SearchIndexesRequest, Relewise.Client")
        {
            return SearchIndexesRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.SearchIndexRequest, Relewise.Client")
        {
            return SearchIndexRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.SearchRequestCollection, Relewise.Client")
        {
            return SearchRequestCollection::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.SearchTermPredictionRequest, Relewise.Client")
        {
            return SearchTermPredictionRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.SynonymsRequest, Relewise.Client")
        {
            return SynonymsRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.Rules.DecompoundRulesRequest, Relewise.Client")
        {
            return DecompoundRulesRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.Rules.DeleteDecompoundRulesRequest, Relewise.Client")
        {
            return DeleteDecompoundRulesRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.Rules.DeletePredictionRulesRequest, Relewise.Client")
        {
            return DeletePredictionRulesRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.Rules.DeleteRedirectRulesRequest, Relewise.Client")
        {
            return DeleteRedirectRulesRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.Rules.DeleteSearchResultModifierRulesRequest, Relewise.Client")
        {
            return DeleteSearchResultModifierRulesRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.Rules.DeleteSearchTermModifierRulesRequest, Relewise.Client")
        {
            return DeleteSearchTermModifierRulesRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.Rules.DeleteStemmingRulesRequest, Relewise.Client")
        {
            return DeleteStemmingRulesRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.Rules.PredictionRulesRequest, Relewise.Client")
        {
            return PredictionRulesRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.Rules.RedirectRulesRequest, Relewise.Client")
        {
            return RedirectRulesRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.Rules.SaveDecompoundRulesRequest, Relewise.Client")
        {
            return SaveDecompoundRulesRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.Rules.SavePredictionRulesRequest, Relewise.Client")
        {
            return SavePredictionRulesRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.Rules.SaveRedirectRulesRequest, Relewise.Client")
        {
            return SaveRedirectRulesRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.Rules.SaveSearchResultModifierRulesRequest, Relewise.Client")
        {
            return SaveSearchResultModifierRulesRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.Rules.SaveSearchTermModifierRulesRequest, Relewise.Client")
        {
            return SaveSearchTermModifierRulesRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.Rules.SaveStemmingRulesRequest, Relewise.Client")
        {
            return SaveStemmingRulesRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.Rules.SearchResultModifierRulesRequest, Relewise.Client")
        {
            return SearchResultModifierRulesRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.Rules.SearchTermModifierRulesRequest, Relewise.Client")
        {
            return SearchTermModifierRulesRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Search.Rules.StemmingRulesRequest, Relewise.Client")
        {
            return StemmingRulesRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.ContentCategoryRecommendationRequestCollection, Relewise.Client")
        {
            return ContentCategoryRecommendationRequestCollection::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.ContentRecommendationRequestCollection, Relewise.Client")
        {
            return ContentRecommendationRequestCollection::hydrate($arr);
        }
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
        if ($type=="Relewise.Client.Requests.Recommendations.ProductCategoryRecommendationRequestCollection, Relewise.Client")
        {
            return ProductCategoryRecommendationRequestCollection::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Recommendations.ProductRecommendationRequestCollection, Relewise.Client")
        {
            return ProductRecommendationRequestCollection::hydrate($arr);
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
        if ($type=="Relewise.Client.Requests.Queries.BrandQuery, Relewise.Client")
        {
            return BrandQuery::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Queries.ContentCategoryQuery, Relewise.Client")
        {
            return ContentCategoryQuery::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Queries.ContentQuery, Relewise.Client")
        {
            return ContentQuery::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Queries.ProductCategoryQuery, Relewise.Client")
        {
            return ProductCategoryQuery::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Queries.ProductQuery, Relewise.Client")
        {
            return ProductQuery::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Queries.UserQuery, Relewise.Client")
        {
            return UserQuery::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Merchandising.DeleteMerchandisingRuleRequest, Relewise.Client")
        {
            return DeleteMerchandisingRuleRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Merchandising.MerchandisingRuleRequest, Relewise.Client")
        {
            return MerchandisingRuleRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Merchandising.MerchandisingRulesRequest, Relewise.Client")
        {
            return MerchandisingRulesRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Merchandising.SaveMerchandisingRuleRequest, Relewise.Client")
        {
            return SaveMerchandisingRuleRequest::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Analyzers.ProductPerformanceRequest, Relewise.Client")
        {
            return ProductPerformanceRequest::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        return $result;
    }
}
