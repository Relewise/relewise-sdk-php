<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

abstract class TimedResponse
{
    public string $typeDefinition = "Relewise.Client.Responses.TimedResponse, Relewise.Client";
    public Statistics $statistics;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Responses.BrandDetailsCollectionResponse, Relewise.Client")
        {
            return BrandDetailsCollectionResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.BrandRecommendationResponse, Relewise.Client")
        {
            return BrandRecommendationResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.ContentCategoryDetailsCollectionResponse, Relewise.Client")
        {
            return ContentCategoryDetailsCollectionResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.ContentCategoryRecommendationResponse, Relewise.Client")
        {
            return ContentCategoryRecommendationResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.ContentCategoryRecommendationResponseCollection, Relewise.Client")
        {
            return ContentCategoryRecommendationResponseCollection::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.ContentDetailsCollectionResponse, Relewise.Client")
        {
            return ContentDetailsCollectionResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.ContentRecommendationResponse, Relewise.Client")
        {
            return ContentRecommendationResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.ContentRecommendationResponseCollection, Relewise.Client")
        {
            return ContentRecommendationResponseCollection::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.MixedRecommendationResponseCollection, Relewise.Client")
        {
            return MixedRecommendationResponseCollection::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.ProductCategoryDetailsCollectionResponse, Relewise.Client")
        {
            return ProductCategoryDetailsCollectionResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.ProductCategoryRecommendationResponse, Relewise.Client")
        {
            return ProductCategoryRecommendationResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.ProductCategoryRecommendationResponseCollection, Relewise.Client")
        {
            return ProductCategoryRecommendationResponseCollection::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.ProductDetailsCollectionResponse, Relewise.Client")
        {
            return ProductDetailsCollectionResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.ProductRecommendationResponse, Relewise.Client")
        {
            return ProductRecommendationResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.ProductRecommendationResponseCollection, Relewise.Client")
        {
            return ProductRecommendationResponseCollection::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.SearchTermRecommendationResponse, Relewise.Client")
        {
            return SearchTermRecommendationResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.UserDetailsCollectionResponse, Relewise.Client")
        {
            return UserDetailsCollectionResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Triggers.GlobalTriggerConfigurationResponse, Relewise.Client")
        {
            return GlobalTriggerConfigurationResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Triggers.TriggerConfigurationCollectionResponse, Relewise.Client")
        {
            return TriggerConfigurationCollectionResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Triggers.TriggerConfigurationResponse, Relewise.Client")
        {
            return TriggerConfigurationResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Triggers.TriggerResultResponse, Relewise.Client")
        {
            return TriggerResultResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Search.ContentCategorySearchResponse, Relewise.Client")
        {
            return ContentCategorySearchResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Search.ContentSearchResponse, Relewise.Client")
        {
            return ContentSearchResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Search.DeleteSearchRulesResponse, Relewise.Client")
        {
            return DeleteSearchRulesResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Search.DeleteSynonymsResponse, Relewise.Client")
        {
            return DeleteSynonymsResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Search.ProductCategorySearchResponse, Relewise.Client")
        {
            return ProductCategorySearchResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Search.ProductSearchResponse, Relewise.Client")
        {
            return ProductSearchResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Search.SaveSynonymsResponse, Relewise.Client")
        {
            return SaveSynonymsResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Search.SearchIndexCollectionResponse, Relewise.Client")
        {
            return SearchIndexCollectionResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Search.SearchIndexResponse, Relewise.Client")
        {
            return SearchIndexResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Search.SearchResponseCollection, Relewise.Client")
        {
            return SearchResponseCollection::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Search.SearchTermPredictionResponse, Relewise.Client")
        {
            return SearchTermPredictionResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Search.SynonymsResponse, Relewise.Client")
        {
            return SynonymsResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Search.Rules.DecompoundRulesResponse, Relewise.Client")
        {
            return DecompoundRulesResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Search.Rules.PredictionRulesResponse, Relewise.Client")
        {
            return PredictionRulesResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Search.Rules.RedirectRulesResponse, Relewise.Client")
        {
            return RedirectRulesResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Search.Rules.SaveDecompoundRulesResponse, Relewise.Client")
        {
            return SaveDecompoundRulesResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Search.Rules.SavePredictionRulesResponse, Relewise.Client")
        {
            return SavePredictionRulesResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Search.Rules.SaveRedirectRulesResponse, Relewise.Client")
        {
            return SaveRedirectRulesResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Search.Rules.SaveStemmingRulesResponse, Relewise.Client")
        {
            return SaveStemmingRulesResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Search.Rules.StemmingRulesResponse, Relewise.Client")
        {
            return StemmingRulesResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Merchandising.MerchandisingRuleResponse, Relewise.Client")
        {
            return MerchandisingRuleResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Merchandising.MerchandisingRuleCollectionResponse, Relewise.Client")
        {
            return MerchandisingRuleCollectionResponse::hydrate($arr);
        }
        if ($type=="Relewise.Client.Responses.Analyzers.ProductPerformanceResponse, Relewise.Client")
        {
            return ProductPerformanceResponse::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        if (array_key_exists("statistics", $arr))
        {
            $result->statistics = Statistics::hydrate($arr["statistics"]);
        }
        return $result;
    }
    function setStatistics(Statistics $statistics)
    {
        $this->statistics = $statistics;
        return $this;
    }
}
