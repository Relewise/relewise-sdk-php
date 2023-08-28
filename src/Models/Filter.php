<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class Filter
{
    public string $typeDefinition = "Relewise.Client.Requests.Filters.Filter, Relewise.Client";
    public bool $negated;
    public ?FilterSettings $settings;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.Requests.Filters.AndFilter, Relewise.Client")
        {
            return AndFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.BrandAssortmentFilter, Relewise.Client")
        {
            return BrandAssortmentFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.BrandDataFilter, Relewise.Client")
        {
            return BrandDataFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.BrandIdFilter, Relewise.Client")
        {
            return BrandIdFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.CartDataFilter, Relewise.Client")
        {
            return CartDataFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ContentAssortmentFilter, Relewise.Client")
        {
            return ContentAssortmentFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ContentCategoryAssortmentFilter, Relewise.Client")
        {
            return ContentCategoryAssortmentFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ContentCategoryDataFilter, Relewise.Client")
        {
            return ContentCategoryDataFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ContentCategoryHasAncestorFilter, Relewise.Client")
        {
            return ContentCategoryHasAncestorFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ContentCategoryHasChildFilter, Relewise.Client")
        {
            return ContentCategoryHasChildFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ContentCategoryHasContentsFilter, Relewise.Client")
        {
            return ContentCategoryHasContentsFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ContentCategoryHasParentFilter, Relewise.Client")
        {
            return ContentCategoryHasParentFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ContentCategoryIdFilter, Relewise.Client")
        {
            return ContentCategoryIdFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ContentCategoryLevelFilter, Relewise.Client")
        {
            return ContentCategoryLevelFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ContentDataFilter, Relewise.Client")
        {
            return ContentDataFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ContentIdFilter, Relewise.Client")
        {
            return ContentIdFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.OrFilter, Relewise.Client")
        {
            return OrFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ProductAndVariantIdFilter, Relewise.Client")
        {
            return ProductAndVariantIdFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ProductAssortmentFilter, Relewise.Client")
        {
            return ProductAssortmentFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ProductCategoryAssortmentFilter, Relewise.Client")
        {
            return ProductCategoryAssortmentFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ProductCategoryDataFilter, Relewise.Client")
        {
            return ProductCategoryDataFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ProductCategoryHasAncestorFilter, Relewise.Client")
        {
            return ProductCategoryHasAncestorFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ProductCategoryHasChildFilter, Relewise.Client")
        {
            return ProductCategoryHasChildFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ProductCategoryHasParentFilter, Relewise.Client")
        {
            return ProductCategoryHasParentFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ProductCategoryHasProductsFilter, Relewise.Client")
        {
            return ProductCategoryHasProductsFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ProductCategoryIdFilter, Relewise.Client")
        {
            return ProductCategoryIdFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ProductCategoryLevelFilter, Relewise.Client")
        {
            return ProductCategoryLevelFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ProductDataFilter, Relewise.Client")
        {
            return ProductDataFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ProductDisplayNameFilter, Relewise.Client")
        {
            return ProductDisplayNameFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ProductHasVariantsFilter, Relewise.Client")
        {
            return ProductHasVariantsFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ProductIdFilter, Relewise.Client")
        {
            return ProductIdFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ProductListPriceFilter, Relewise.Client")
        {
            return ProductListPriceFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ProductRecentlyPurchasedByUserFilter, Relewise.Client")
        {
            return ProductRecentlyPurchasedByUserFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ProductRecentlyViewedByUserFilter, Relewise.Client")
        {
            return ProductRecentlyViewedByUserFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.ProductSalesPriceFilter, Relewise.Client")
        {
            return ProductSalesPriceFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.VariantAssortmentFilter, Relewise.Client")
        {
            return VariantAssortmentFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.VariantDataFilter, Relewise.Client")
        {
            return VariantDataFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.VariantIdFilter, Relewise.Client")
        {
            return VariantIdFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.VariantListPriceFilter, Relewise.Client")
        {
            return VariantListPriceFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.VariantSalesPriceFilter, Relewise.Client")
        {
            return VariantSalesPriceFilter::hydrate($arr);
        }
        if ($type=="Relewise.Client.Requests.Filters.VariantSpecificationFilter, Relewise.Client")
        {
            return VariantSpecificationFilter::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        if (array_key_exists("negated", $arr))
        {
            $result->negated = $arr["negated"];
        }
        if (array_key_exists("settings", $arr))
        {
            $result->settings = FilterSettings::hydrate($arr["settings"]);
        }
        return $result;
    }
    function setNegated(bool $negated)
    {
        $this->negated = $negated;
        return $this;
    }
    function setSettings(?FilterSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
}
