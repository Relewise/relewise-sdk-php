<?php declare(strict_types=1);

namespace Relewise\Models;

class ContentAttributeSorting extends ContentSorting
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Sorting.Content.ContentAttributeSorting, Relewise.Client";
    
    public ContentAttributeSortingSortableAttribute $attribute;
    public SortMode $mode;
    public static function create(ContentAttributeSortingSortableAttribute $attribute, SortOrder $order, SortMode $mode = SortMode::Auto) : ContentAttributeSorting
    {
        $result = new ContentAttributeSorting();
        $result->attribute = $attribute;
        $result->order = $order;
        $result->mode = $mode;
        return $result;
    }
    
    public static function hydrate(array $arr) : ContentAttributeSorting
    {
        $result = ContentSorting::hydrateBase(new ContentAttributeSorting(), $arr);
        if (array_key_exists("attribute", $arr))
        {
            $result->attribute = ContentAttributeSortingSortableAttribute::from($arr["attribute"]);
        }
        if (array_key_exists("mode", $arr))
        {
            $result->mode = SortMode::from($arr["mode"]);
        }
        return $result;
    }
    
    function setAttribute(ContentAttributeSortingSortableAttribute $attribute)
    {
        $this->attribute = $attribute;
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
