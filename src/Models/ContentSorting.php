<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class ContentSorting extends ContentSortingSorting
{
    public string $typeDefinition = "";
    
    
    public static function hydrate(array $arr)
    {
        $type = $arr["\$type"];
        if ($type=="Relewise.Client.DataTypes.Search.Sorting.Content.ContentAttributeSorting, Relewise.Client")
        {
            return ContentAttributeSorting::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Sorting.Content.ContentDataSorting, Relewise.Client")
        {
            return ContentDataSorting::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Sorting.Content.ContentPopularitySorting, Relewise.Client")
        {
            return ContentPopularitySorting::hydrate($arr);
        }
        if ($type=="Relewise.Client.DataTypes.Search.Sorting.Content.ContentRelevanceSorting, Relewise.Client")
        {
            return ContentRelevanceSorting::hydrate($arr);
        }
    }
    
    public static function hydrateBase(mixed $result, array $arr)
    {
        $result = ContentSortingSorting::hydrateBase($result, $arr);
        return $result;
    }
    
    function setOrder(SortOrder $order)
    {
        $this->order = $order;
        return $this;
    }
    
    function setThenBy(ContentSorting $thenBy)
    {
        $this->thenBy = $thenBy;
        return $this;
    }
}
