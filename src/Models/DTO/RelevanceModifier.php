<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

abstract class RelevanceModifier
{
    public string $typeDefinition = "Relewise.Client.Requests.RelevanceModifiers.RelevanceModifier, Relewise.Client";
    public FilterCollection $filters;
    public array $custom;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.RelevanceModifiers.BrandIdRelevanceModifier, Relewise.Client")
        {
            return BrandIdRelevanceModifier::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.RelevanceModifiers.ProductAssortmentRelevanceModifier, Relewise.Client")
        {
            return ProductAssortmentRelevanceModifier::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.RelevanceModifiers.ProductCategoryIdRelevanceModifier, Relewise.Client")
        {
            return ProductCategoryIdRelevanceModifier::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.RelevanceModifiers.ProductDataRelevanceModifier, Relewise.Client")
        {
            return ProductDataRelevanceModifier::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.RelevanceModifiers.ProductIdRelevanceModifier, Relewise.Client")
        {
            return ProductIdRelevanceModifier::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.RelevanceModifiers.ProductListPriceRelevanceModifier, Relewise.Client")
        {
            return ProductListPriceRelevanceModifier::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.RelevanceModifiers.ProductRecentlyPurchasedByUserRelevanceModifier, Relewise.Client")
        {
            return ProductRecentlyPurchasedByUserRelevanceModifier::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.RelevanceModifiers.ProductRecentlyViewedByUserRelevanceModifier, Relewise.Client")
        {
            return ProductRecentlyViewedByUserRelevanceModifier::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.RelevanceModifiers.ProductSalesPriceRelevanceModifier, Relewise.Client")
        {
            return ProductSalesPriceRelevanceModifier::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.RelevanceModifiers.UserFavoriteProductRelevanceModifier, Relewise.Client")
        {
            return UserFavoriteProductRelevanceModifier::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.RelevanceModifiers.VariantAssortmentRelevanceModifier, Relewise.Client")
        {
            return VariantAssortmentRelevanceModifier::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.RelevanceModifiers.VariantDataRelevanceModifier, Relewise.Client")
        {
            return VariantDataRelevanceModifier::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.RelevanceModifiers.VariantListPriceRelevanceModifier, Relewise.Client")
        {
            return VariantListPriceRelevanceModifier::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.RelevanceModifiers.VariantSalesPriceRelevanceModifier, Relewise.Client")
        {
            return VariantSalesPriceRelevanceModifier::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.RelevanceModifiers.VariantSpecificationsInCommonRelevanceModifier, Relewise.Client")
        {
            return VariantSpecificationsInCommonRelevanceModifier::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.RelevanceModifiers.VariantSpecificationValueRelevanceModifier, Relewise.Client")
        {
            return VariantSpecificationValueRelevanceModifier::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        if (array_key_exists("filters", $arr))
        {
            $result->filters = FilterCollection::hydrate($arr["filters"]);
        }
        if (array_key_exists("custom", $arr))
        {
            $result->custom = array();
            foreach($arr["custom"] as $key => $value)
            {
                $result->custom[$key] = $value;
            }
        }
        return $result;
    }
    function withFilters(FilterCollection $filters)
    {
        $this->filters = $filters;
        return $this;
    }
    function withCustom(string $key, string $value)
    {
        if (!isset($this->custom))
        {
            $this->custom = array();
        }
        $this->custom[$key] = $value;
        return $this;
    }
}
