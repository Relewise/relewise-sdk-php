<?php declare(strict_types=1);

namespace Relewise\Models;

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
    /**
     * Sets order to a new value.
     * @param SortOrder $order new value.
     */
    function setOrder(SortOrder $order)
    {
        $this->order = $order;
        return $this;
    }
    /**
     * Sets thenBy to a new value.
     * @param ContentSorting $thenBy new value.
     */
    function setThenBy(ContentSorting $thenBy)
    {
        $this->thenBy = $thenBy;
        return $this;
    }
}
