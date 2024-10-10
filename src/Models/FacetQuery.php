<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class FacetQuery
{
    public string $typeDefinition = "";
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ContentFacetQuery, Relewise.Client")
        {
            return ContentFacetQuery::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ProductCategoryFacetQuery, Relewise.Client")
        {
            return ProductCategoryFacetQuery::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Queries.ProductFacetQuery, Relewise.Client")
        {
            return ProductFacetQuery::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        return $result;
    }
}
