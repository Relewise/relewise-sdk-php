<?php declare(strict_types=1);

namespace Relewise\Models;

abstract class ContentSortingSorting
{
    public string $typeDefinition = "";
    
    public SortOrder $order;
    
    public ContentSorting $thenBy;
    
    
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
        if (array_key_exists("order", $arr))
        {
            $result->order = SortOrder::from($arr["order"]);
        }
        if (array_key_exists("thenBy", $arr))
        {
            $result->thenBy = ContentSorting::hydrate($arr["thenBy"]);
        }
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
