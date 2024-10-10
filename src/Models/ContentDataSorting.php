<?php declare(strict_types=1);

namespace Relewise\Models;

class ContentDataSorting extends ContentSorting
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Sorting.Content.ContentDataSorting, Relewise.Client";
    public string $key;
    public SortMode $mode;
    
    public static function create(string $key, SortOrder $order, SortMode $mode = SortMode::Auto) : ContentDataSorting
    {
        $result = new ContentDataSorting();
        $result->key = $key;
        $result->order = $order;
        $result->mode = $mode;
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentDataSorting
    {
        $result = ContentSorting::hydrateBase(new ContentDataSorting(), $arr);
        if (array_key_exists("key", $arr))
        {
            $result->key = $arr["key"];
        }
        if (array_key_exists("mode", $arr))
        {
            $result->mode = SortMode::from($arr["mode"]);
        }
        return $result;
    }
    
    function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }
    
    function setMode(SortMode $mode)
    {
        $this->mode = $mode;
        return $this;
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
