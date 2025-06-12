<?php declare(strict_types=1);

namespace Relewise\Models;

/** Used for sorting the available values of a facet by the largest number of hits descending. */
class ByHitsFacetSorting extends FacetSorting
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Facets.Sorting.ByHitsFacetSorting, Relewise.Client";
    public static function create() : ByHitsFacetSorting
    {
        $result = new ByHitsFacetSorting();
        return $result;
    }
    
    public static function hydrate(array $arr) : ByHitsFacetSorting
    {
        $result = FacetSorting::hydrateBase(new ByHitsFacetSorting(), $arr);
        return $result;
    }
}
