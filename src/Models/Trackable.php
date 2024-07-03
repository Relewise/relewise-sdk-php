<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class Trackable
{
    public string $typeDefinition = "";
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.BrandAdministrativeAction, Relewise.Client")
        {
            return BrandAdministrativeAction::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.BrandUpdate, Relewise.Client")
        {
            return BrandUpdate::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.BrandView, Relewise.Client")
        {
            return BrandView::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Cart, Relewise.Client")
        {
            return Cart::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.CompanyAdministrativeAction, Relewise.Client")
        {
            return CompanyAdministrativeAction::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.CompanyUpdate, Relewise.Client")
        {
            return CompanyUpdate::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.ContentAdministrativeAction, Relewise.Client")
        {
            return ContentAdministrativeAction::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.ContentCategoryAdministrativeAction, Relewise.Client")
        {
            return ContentCategoryAdministrativeAction::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.ContentCategoryUpdate, Relewise.Client")
        {
            return ContentCategoryUpdate::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.ContentCategoryView, Relewise.Client")
        {
            return ContentCategoryView::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.ContentUpdate, Relewise.Client")
        {
            return ContentUpdate::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.ContentView, Relewise.Client")
        {
            return ContentView::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Order, Relewise.Client")
        {
            return Order::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.ProductAdministrativeAction, Relewise.Client")
        {
            return ProductAdministrativeAction::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.ProductCategoryAdministrativeAction, Relewise.Client")
        {
            return ProductCategoryAdministrativeAction::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.ProductCategoryUpdate, Relewise.Client")
        {
            return ProductCategoryUpdate::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.ProductCategoryView, Relewise.Client")
        {
            return ProductCategoryView::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.ProductUpdate, Relewise.Client")
        {
            return ProductUpdate::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.ProductView, Relewise.Client")
        {
            return ProductView::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.SearchTerm, Relewise.Client")
        {
            return SearchTerm::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.UserUpdate, Relewise.Client")
        {
            return UserUpdate::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        return $result;
    }
}
