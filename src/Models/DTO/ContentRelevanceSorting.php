<?php declare(strict_types=1);

namespace Relewise\Models\DTO;

use DateTime;

class ContentRelevanceSorting extends ContentSorting
{
    public string $typeDefinition = "Relewise.Client.DataTypes.Search.Sorting.Content.ContentRelevanceSorting, Relewise.Client";
    public static function create(SortOrder $order = SortOrder::Descending) : ContentRelevanceSorting
    {
        $result = new ContentRelevanceSorting();
        $result->order = $order;
        return $result;
    }
    public static function hydrate(array $arr) : ContentRelevanceSorting
    {
        $result = ContentSorting::hydrateBase(new ContentRelevanceSorting(), $arr);
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
