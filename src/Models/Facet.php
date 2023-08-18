<?php declare(strict_types=1);

namespace Relewise\Models;

use DateTime;

abstract class Facet
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Queries.Facet, Relewise.Client";
    public FacetingField $field;
    public ?FacetSettings $settings;
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ContentAssortmentFacet, Relewise.Client")
        {
            return ContentAssortmentFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ProductAssortmentFacet, Relewise.Client")
        {
            return ProductAssortmentFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ProductCategoryAssortmentFacet, Relewise.Client")
        {
            return ProductCategoryAssortmentFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.BrandFacet, Relewise.Client")
        {
            return BrandFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.CategoryFacet, Relewise.Client")
        {
            return CategoryFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ContentDataObjectFacet, Relewise.Client")
        {
            return ContentDataObjectFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ContentDataDoubleRangeFacet, Relewise.Client")
        {
            return ContentDataDoubleRangeFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ContentDataDoubleRangesFacet, Relewise.Client")
        {
            return ContentDataDoubleRangesFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ContentDataStringValueFacet, Relewise.Client")
        {
            return ContentDataStringValueFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ContentDataBooleanValueFacet, Relewise.Client")
        {
            return ContentDataBooleanValueFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ContentDataDoubleValueFacet, Relewise.Client")
        {
            return ContentDataDoubleValueFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ContentDataIntegerValueFacet, Relewise.Client")
        {
            return ContentDataIntegerValueFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.DataObjectFacet, Relewise.Client")
        {
            return DataObjectFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.DataObjectDoubleRangeFacet, Relewise.Client")
        {
            return DataObjectDoubleRangeFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.DataObjectDoubleRangesFacet, Relewise.Client")
        {
            return DataObjectDoubleRangesFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.DataObjectStringValueFacet, Relewise.Client")
        {
            return DataObjectStringValueFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.DataObjectBooleanValueFacet, Relewise.Client")
        {
            return DataObjectBooleanValueFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.DataObjectDoubleValueFacet, Relewise.Client")
        {
            return DataObjectDoubleValueFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.PriceRangeFacet, Relewise.Client")
        {
            return PriceRangeFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.PriceRangesFacet, Relewise.Client")
        {
            return PriceRangesFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ProductCategoryDataObjectFacet, Relewise.Client")
        {
            return ProductCategoryDataObjectFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ProductCategoryDataDoubleRangeFacet, Relewise.Client")
        {
            return ProductCategoryDataDoubleRangeFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ProductCategoryDataDoubleRangesFacet, Relewise.Client")
        {
            return ProductCategoryDataDoubleRangesFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ProductCategoryDataStringValueFacet, Relewise.Client")
        {
            return ProductCategoryDataStringValueFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ProductCategoryDataBooleanValueFacet, Relewise.Client")
        {
            return ProductCategoryDataBooleanValueFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ProductCategoryDataDoubleValueFacet, Relewise.Client")
        {
            return ProductCategoryDataDoubleValueFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ProductDataObjectFacet, Relewise.Client")
        {
            return ProductDataObjectFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ProductDataDoubleRangeFacet, Relewise.Client")
        {
            return ProductDataDoubleRangeFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ProductDataDoubleRangesFacet, Relewise.Client")
        {
            return ProductDataDoubleRangesFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ProductDataStringValueFacet, Relewise.Client")
        {
            return ProductDataStringValueFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ProductDataBooleanValueFacet, Relewise.Client")
        {
            return ProductDataBooleanValueFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ProductDataDoubleValueFacet, Relewise.Client")
        {
            return ProductDataDoubleValueFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ProductDataIntegerValueFacet, Relewise.Client")
        {
            return ProductDataIntegerValueFacet::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.VariantSpecificationFacet, Relewise.Client")
        {
            return VariantSpecificationFacet::hydrate($arr);
        }
    }
    public static function hydrateBase(mixed $result, array $arr)
    {
        if (array_key_exists("field", $arr))
        {
            $result->field = FacetingField::from($arr["field"]);
        }
        if (array_key_exists("settings", $arr))
        {
            $result->settings = FacetSettings::hydrate($arr["settings"]);
        }
        return $result;
    }
    function setField(FacetingField $field)
    {
        $this->field = $field;
        return $this;
    }
    function setSettings(?FacetSettings $settings)
    {
        $this->settings = $settings;
        return $this;
    }
}
