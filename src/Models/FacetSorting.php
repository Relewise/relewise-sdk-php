<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class FacetSorting
{
    public string $typeDefinition = "";
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Search.Facets.Sorting.ByHitsFacetSorting, Relewise.Client")
        {
            return ByHitsFacetSorting::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        return $result;
    }
}
